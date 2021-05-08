<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\EditRequest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepository $RoleRepository,PermissionRepository $PermissionRepository)
    {
        $this->roleRepository = $RoleRepository;
        $this->permissionRepository = $PermissionRepository;
    }

    public function index()
    {
        $datas = $this->roleRepository->getData();
        return view(checkView('admin.role.index'),compact('datas'));
    }

    public function create()
    {
        $permission = $this->permissionRepository->listData();
        return view(checkView('admin.role.create'),compact('permission'));
    }

    public function store(CreateRequest $request)
    {
        $this->roleRepository->storeData($request);
        return redirect(route('role.index'))->with('message', 'Done');
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->listData();
        $data = $this->roleRepository->showData($id);
        $role_permission = $this->roleRepository->getRolePermission($id);
        return view(checkView('admin.role.edit'),compact('data','permission','role_permission'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->roleRepository->updateData($request, $id);
        return redirect(route('role.index'))->with('message', 'Done');
    }
}
