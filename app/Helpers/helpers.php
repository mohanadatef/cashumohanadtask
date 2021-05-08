<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;





if (!function_exists('permissionShow')) {
    function permissionShow($title)
    {
        $role=DB::table('users')->join('user_roles', 'user_roles.user_id', '=', 'users.id')
            ->where('user_roles.user_id', Auth::id())
            ->pluck('user_roles.role_id');
        $permission = DB::table('permissions')
            ->join('role_permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->wherein('role_permissions.role_id', $role)
            ->where('permissions.name', $title)
            ->count();
        return $permission ? true : false;
    }
}

if (!function_exists('checkView')) {
    function checkView($view)
    {
        return view()->exists($view) ? $view : 'errors.404';
    }
}
