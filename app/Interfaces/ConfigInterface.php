<?php

namespace App\Interfaces;

interface ConfigInterface
{
    public function getData();
    public function storeData($request);
    public function showData($id);
    public function updateData($request, $id);
}
