<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $users = [
            //developer
            [
                'name' => 'mohanad atef',
                'email' => 'mohanad_1x@yahoo.com',
                'website' => 'mohanad',
                'user_id' => '1',
                'code' => 'ADFSD',
                'password' => Hash::make('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
