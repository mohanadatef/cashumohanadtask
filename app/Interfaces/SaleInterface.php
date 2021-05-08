<?php

namespace App\Interfaces;

interface SaleInterface
{
    public function getData();
    public function storeData($request);
    public function showData($id);
}
