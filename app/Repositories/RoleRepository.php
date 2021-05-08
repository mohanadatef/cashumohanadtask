<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\RolePermission;
use App\Models\Role;

class RoleRepository implements RoleInterface
{
    protected $data;
    protected $role_permission;

    public function __construct(Role $Role, RolePermission $Role_Permission)
    {
        $this->data = $Role;
        $this->role_permission = $Role_Permission;
    }

    public function getData()
    {
        return $this->data->all();
    }

    public function storeData( $request)
    {
        $data =$this->data->create($request->all());
        $data->permission()->sync((array)$request->permission);
        $data->save();
    }

    public function showData($id)
    {
        return $this->data->findorFail($id);
    }

    public function updateData($request, $id)
    {
        $data = $this->showData($id);
        $data->permission()->sync((array)$request->permission);
        $data->update($request->all());
    }

    public function listData()
    {
        return $this->data->select('name', 'id')->where('id','!=',1)->where('id','!=',2)->get();
    }

    public function getRolePermission($id)
    {
        return $this->role_permission->where('role_id', $id)->get();
    }

}
