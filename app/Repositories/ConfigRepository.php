<?php

namespace App\Repositories;

use App\Http\Resources\ConfigResource;
use App\Interfaces\ConfigInterface;
use App\Models\Config;

class ConfigRepository implements ConfigInterface
{
    protected $data;

    public function __construct(Config $Config)
    {
        $this->data = $Config;
    }

    public function getData()
    {
        return $this->data->with('user')->get();
    }

    public function storeData($request)
    {
        $data = $this->data->create($request->all());
        $data = $this->showData($data->id);
        return '<tr id="' . $data->id . '"><td id="name-' . $data->id . '">' . $data->user->name . '</td>
        <td id="sales_target-' . $data->id . '">' . $data->sales_target . '</td>
        <td><button type="button" class="btn btn-outline-primary btn-block btn-sm"
        onclick="showItem(' . $data->id . ')"><i class="fa fa-edit"></i> Edit</button>
        <button id="openModael' . $data->id . '" type="button" class="d-none" data-toggle="modal"
        data-target="#modal-edit"></button></td></tr>';
    }

    public function showData($id)
    {
        return $this->data->with('user')->findorFail($id);
    }

    public function updateData($request, $id)
    {
        $data = $this->showData($id);
        $data->update($request->all());
        return new ConfigResource($data);
    }
}
