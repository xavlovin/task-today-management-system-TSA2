<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsArchivedToTasks extends Migration
{
    // Adds the is_archived flag used for soft delete (0 = active, 1 = archived).
    public function up()
    {
        $this->forge->addColumn('tasks', [
            'is_archived' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => 0,
            ],
        ]);
    }

    // Removes the is_archived column again.
    public function down()
    {
        $this->forge->dropColumn('tasks', 'is_archived');
    }
}
