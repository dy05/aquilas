<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'admin@admin.com';
        if (! User::query()->firstWhere('email', $email)) {
            User::factory([
                'name' => 'Administrator',
                'is_admin' => 1,
                'email' => $email
            ])->create();
        }
    }
}
