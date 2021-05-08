<?php

namespace App\Interfaces;

interface PermissionInterface{

    public function getData();
    public function storeData( $request);
    public function showData($id);
    public function updateData( $request, $id);
    public function listData();
}
