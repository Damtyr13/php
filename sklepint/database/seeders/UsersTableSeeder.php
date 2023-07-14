<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('Admin123'),
                'is_admin' => '1'
            ],
           
        ];


        DB::table('users')->insert($users);
    }
}
