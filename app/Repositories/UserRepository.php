<?php

namespace App\Repositories;

use App\Http\Controllers\Auth\VerificationController;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    protected $data;
    protected $user_role;

    public function __construct(User $User, UserRole $User_Role)
    {
        $this->data = $User;
        $this->user_role = $User_Role;
    }

    public function getData()
    {
        foreach (Auth::user()->role as $role) {
            if ($role->name == "developer") {
               $data = $this->data->with('role','user')->where('id','!=',1)->get();
                break;
            }elseif($role->name == "customer"){
                $data =  $this->data->with('role','user')->where('user_id',Auth::id())->where('id','!=',1)->get();
                break;
            }elseif($role->name == "admin"){
                $data =  $this->data->with('role','user')->where('user_id',Auth::user()->user_id)->where('id','!=',1)->get();
            break;
            }
        }
        return $data;
    }

    public function storeData($request)
    {
        $datas['password'] = Hash::make($request->password);
        foreach (Auth::user()->role as $role) {
            if ($role->name == "developer" || $role->name == "customer") {
                $datas['user_id'] = Auth::id();
            }elseif($role->name == "admin"){
                $datas['user_id'] = Auth::user()->user_id;
            }
        }
        $datas['user_id'] = Auth::user();
        $data = $this->data->create(array_merge($request->all(), $datas));
        $data->role()->sync((array)$request->role);
        $data->save();
        $this->sendEmailVerify($data->email);
    }


    public function showData($id)
    {
        return $this->data->with('role','user')->findorFail($id);
    }

    public function updateData($request, $id)
    {
        $data = $this->showData($id);
        $data->role()->sync((array)$request->role);
        $data->update($request->all());
    }

    public function getUserRole($id)
    {
        return $this->user_role->where('user_id', $id)->get();
    }

    public function getDataRole($role)
    {
        return $this->data->join('user_roles', 'user_roles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('roles.name', $role)
            ->select('users.*')
            ->get();
    }

    public function sendEmailVerify($email)
    {
        $user=User::where('email',$email)->first();
        $user->code=Str::random(5);
        $user->save();
        $details = [
            'title' => 'Mail for verify',
            'body' =>  $user->code,
        ];
        \Mail::to($email)->send(new \App\Mail\MyTestMail($details));
    }
}
