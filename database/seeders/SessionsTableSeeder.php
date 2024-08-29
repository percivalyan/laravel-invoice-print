<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsTableSeeder extends Seeder
{
    /**
     * Seed the sessions table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'id' => 'sessionid123',
                'user_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                'payload' => 'sessiondata',
                'last_activity' => time(),
            ],
            [
                'id' => 'sessionid456',
                'user_id' => 2,
                'ip_address' => '127.0.0.2',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Firefox/90.0',
                'payload' => 'sessiondata',
                'last_activity' => time(),
            ],
        ]);
    }
}
