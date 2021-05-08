<?php
namespace Database\Seeders;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles = [
            //developer
            [
                'name' => 'developer',
            ],
            //customer
            [
                'name' => 'customer',
            ],
            //admin
            [
                'name' => 'admin',
            ],
            //sale
            [
                'name' => 'sale',
            ],
            //Back Office
            [
                'name' => 'back_office',
            ],
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
