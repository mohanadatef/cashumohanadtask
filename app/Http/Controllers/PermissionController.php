<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreateRequest;
use App\Http\Requests\Permission\EditRequest;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepository $PermissionRepository)
    {
        $this->permissionRepository = $PermissionRepository;
    }

    public function index()
    {
        $datas = $this->permissionRepository->getData();
        return view(checkView('admin.permission.index'), compact('datas'));
    }

    public function store(CreateRequest $request)
    {
        return response()->json($this->permissionRepository->storeData($request));
    }

    public function update(EditRequest $request, $id)
    {
        return response()->json($this->permissionRepository->updateData($request, $id));
    }

    public function show($id)
    {
        return $this->permissionRepository->showData($id);
    }
}
