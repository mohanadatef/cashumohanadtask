<?php

namespace App\Repositories;

use App\Interfaces\SaleInterface;
use App\Models\Sale;

class SaleRepository implements SaleInterface
{
    protected $data;

    public function __construct(Sale $Sale)
    {
        $this->data = $Sale;
    }

    public function getData()
    {
        return $this->data->with('user')->get();
    }

    public function storeData($request)
    {
        $data=$this->data->create($request->all());
        $data = $this->showData($data->id);
        return '<tr id="' . $data->id . '"><td id="payment-' . $data->id . '">' . $data->payment . '</td>
        <td id="name-' . $data->id . '">' . $data->user->name . '</td></tr>';
    }

    public function showData($id)
    {
        return $this->data->findorFail($id);
    }
}
