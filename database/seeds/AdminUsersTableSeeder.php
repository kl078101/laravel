<?php

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(AdminUser $adminuser)
    {
        //
        $adminuser->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'state' => AdminUser::NORMAL,
        ]);

    }
}
