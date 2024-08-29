<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokensTableSeeder extends Seeder
{
    /**
     * Seed the password_reset_tokens table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_reset_tokens')->insert([
            [
                'email' => 'john.doe@example.com',
                'token' => 'sampletoken123',
                'created_at' => now(),
            ],
            [
                'email' => 'jane.smith@example.com',
                'token' => 'sampletoken456',
                'created_at' => now(),
            ],
        ]);
    }
}
