<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'xav.dev',
            'full_name'  => 'Xavier Dela Cruz',
            'email'      => 'xavier.delacruz@university.edu.ph',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
