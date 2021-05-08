<?php

namespace App\Interfaces;

interface RoleInterface{

    public function getData();
    public function storeData( $request);
    public function showData($id);
    public function updateData( $request, $id);
    public function listData();
    public function getRolePermission($id);
}
