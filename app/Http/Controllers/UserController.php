<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $UserRepository,RoleRepository $RoleRepository)
    {
        $this->userRepository = $UserRepository;
        $this->roleRepository = $RoleRepository;
    }

    public function index()
    {
        $datas = $this->userRepository->getData();
        return view(checkView('admin.user.index'),compact('datas'));
    }

    public function create()
    {
        $role = $this->roleRepository->listData();
        return view(checkView('admin.user.create'),compact('role'));
    }

    public function store(CreateRequest $request)
    {
        $this->userRepository->storeData($request);
        return redirect(route('user.index'))->with('message', 'Done') ;
    }

    public function edit($id)
    {
        $role = $this->roleRepository->listData();
        $data = $this->userRepository->showData($id);
        $user_role = $this->userRepository->getUserRole($id);
        return view(checkView('admin.user.edit'),compact('data','role','user_role'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->userRepository->updateData($request, $id);
        return redirect(route('user.index'))->with('message', "Done");
    }
}
