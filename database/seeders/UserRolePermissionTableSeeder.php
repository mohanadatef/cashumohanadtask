<?php
namespace Database\Seeders;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UserRole::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $UserRoles = [
            //developer
            [
                'role_id' => '1',
                'user_id' => '1',
            ],
        ];
        foreach ($UserRoles as $key => $value) {
            UserRole::create($value);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RolePermission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permission = Permission::all();
        foreach ($permission as  $value) {
            RolePermission::create(['role_id'=>1,'permission_id'=>$value->id]);
        }
        RolePermission::create(['role_id'=>3,'permission_id'=>2]);
        RolePermission::create(['role_id'=>3,'permission_id'=>11]);
        RolePermission::create(['role_id'=>3,'permission_id'=>12]);
        RolePermission::create(['role_id'=>3,'permission_id'=>13]);
        RolePermission::create(['role_id'=>3,'permission_id'=>14]);
        RolePermission::create(['role_id'=>3,'permission_id'=>15]);
        RolePermission::create(['role_id'=>3,'permission_id'=>16]);
        RolePermission::create(['role_id'=>3,'permission_id'=>17]);
        RolePermission::create(['role_id'=>3,'permission_id'=>18]);
        RolePermission::create(['role_id'=>3,'permission_id'=>19]);
        RolePermission::create(['role_id'=>5,'permission_id'=>17]);
        RolePermission::create(['role_id'=>5,'permission_id'=>18]);
        RolePermission::create(['role_id'=>5,'permission_id'=>19]);
        RolePermission::create(['role_id'=>2,'permission_id'=>1]);
        RolePermission::create(['role_id'=>4,'permission_id'=>16]);
        RolePermission::create(['role_id'=>4,'permission_id'=>15]);
    }
}
