<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $login = env('ADMIN_LOGIN', 'admin');
        $password = env('ADMIN_PASSWORD');

        if (!$password) {
            $this->command->error('ADMIN_PASSWORD is not set in .env');
            return;
        }

        User::updateOrCreate(
            ['login' => $login],
            [
                'name' => 'Admin',
                'password' => $password,
            ]
        );

        $this->command->info("Admin user '{$login}' created/updated.");
    }
}
