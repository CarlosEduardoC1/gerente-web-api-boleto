<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        $this->createAdmins(); 
    }

    private function createAdmins()
    {
        User::create([
            'email' => 'admin@mail.com', 
            'name'  => 'Admin',
            'password' => bcrypt('123456')
        ]);
        $this->command->info('User admin created');
    }
}