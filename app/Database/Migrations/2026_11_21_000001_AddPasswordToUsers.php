<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    // Adds the password column (stores a password_hash() value, never plain text).
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'email',
            ],
        ]);
    }

    // Removes the password column again.
    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}
