<?php

namespace App\Interfaces;

interface UserInterface{
    public function getData();
    public function storeData( $request);
    public function showData($id);
    public function updateData( $request, $id);
    public function getUserRole($id);
    public function getDataRole($role);
    public function sendEmailVerify($email);
}
