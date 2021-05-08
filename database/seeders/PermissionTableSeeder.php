<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
            //dashboard
            [
                'name' => 'dashboard-show',
                'show_name' => 'dashboard show',
                'description' => 'show dashboard',
            ],
            //acl
            [
                'name' => 'acl-list',
                'show_name' => 'acl list',
                'description' => 'list acl',
            ],
            //permission
            [
                'name' => 'permission-list',
                'show_name' => 'permission list',
                'description' => 'list permission',
            ],
            [
                'name' => 'permission-index',
                'show_name' => 'permission index',
                'description' => 'index permission',
            ],
            [
                'name' => 'permission-create',
                'show_name' => 'create permission',
                'description' => 'create data in permission',
            ],
            [
                'name' => 'permission-edit',
                'show_name' => 'edit permission',
                'description' => 'edit data in permission',
            ],
            //role
            [
                'name' => 'role-list',
                'show_name' => 'list role',
                'description' => 'list data in role',
            ],
            [
                'name' => 'role-index',
                'show_name' => 'index role',
                'description' => 'index data in role',
            ],
            [
                'name' => 'role-create',
                'show_name' => 'create role',
                'description' => 'create data in role',
            ],
            [
                'name' => 'role-edit',
                'show_name' => 'edit role',
                'description' => 'edit data in role',
            ],
            //user
            [
                'name' => 'user-list',
                'show_name' => 'user list',
                'description' => 'list user',
            ],
            [
                'name' => 'user-index',
                'show_name' => 'index user',
                'description' => 'index data in user',
            ],
            [
                'name' => 'user-create',
                'show_name' => 'create user',
                'description' => 'create data in user',
            ],
            [
                'name' => 'user-edit',
                'show_name' => 'edit user',
                'description' => 'edit data in user',
            ],
            //sale
            [
                'name' => 'sale-index',
                'show_name' => 'sale index',
                'description' => 'index sale',
            ],
            [
                'name' => 'sale-create',
                'show_name' => 'create sale',
                'description' => 'create data in sale',
            ],
            //config
            [
                'name' => 'config-index',
                'show_name' => 'config index',
                'description' => 'index config',
            ],
            [
                'name' => 'config-create',
                'show_name' => 'create config',
                'description' => 'create data in config',
            ],
            [
                'name' => 'config-edit',
                'show_name' => 'edit config',
                'description' => 'edit data in config',
            ],
        ];
        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
