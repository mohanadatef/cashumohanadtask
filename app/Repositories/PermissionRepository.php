<?php

namespace App\Repositories;

use App\Http\Resources\PermissionResource;
use App\Interfaces\PermissionInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    protected $data;

    public function __construct(Permission $Permission)
    {
        $this->data = $Permission;
    }

    public function getData()
    {
        return $this->data->all();
    }

    public function storeData( $request)
    {
        $data = $this->data->create($request->all());
        return '<tr id="'.$data->id.'"><td id="name-'.$data->id.'">'.$data->name.'</td>
        <td id="show_name-'.$data->id.'">'.$data->show_name.'</td>
        <td id="description-'.$data->id.'">'.$data->description.'</td>
        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"
        onclick="showItem('.$data->id.')"><i class="fa fa-edit"></i> Edit</button>
        <button id="openModael'.$data->id.'" type="button" class="d-none" data-toggle="modal"
        data-target="#modal-edit"></button></td></tr>';
    }

    public function showData($id)
    {
        return $this->data->findorFail($id);
    }

    public function updateData( $request, $id)
    {
        $data=$this->showData($id);
            $data->update($request->all());
       return new PermissionResource($data);
    }

    public function listData()
    {
        return $this->data->select('show_name', 'id')->get();
    }
}
