<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    // Creates the demo user, or sets the demo user's hashed password if the user already exists.
    // The plain password comes from DEMO_PASSWORD in .env, so it is never stored in the code.
    public function run()
    {
        $plainPassword = env('DEMO_PASSWORD');

        if (empty($plainPassword)) {
            echo "Please set DEMO_PASSWORD in your .env file first.\n";
            return;
        }

        $username = 'pmalcantara';
        $password = password_hash($plainPassword, PASSWORD_DEFAULT);

        $existing = $this->db->table('users')->where('username', $username)->get()->getRowArray();

        if ($existing) {
            // User is already there (from TSA1), so only set the password.
            $this->db->table('users')
                ->where('id', $existing['id'])
                ->update(['password' => $password]);
        } else {
            // Fresh database, so insert the full demo user.
            $this->db->table('users')->insert([
                'username'   => $username,
                'full_name'  => 'Prince Xavier M. Alcantara',
                'email'      => 'pmalcantara@fit.edu.ph',
                'password'   => $password,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
