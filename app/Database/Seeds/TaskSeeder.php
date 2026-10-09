<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $today     = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $twoDaysAgo = date('Y-m-d', strtotime('-2 days'));
        $tomorrow  = date('Y-m-d', strtotime('+1 day'));
        $now       = date('Y-m-d H:i:s');

        $data = [
            // Today's tasks
            [
                'title'      => 'Review pull requests on the main repository',
                'status'     => 'pending',
                'task_date'  => $today,
                'created_at' => $now,
            ],
            [
                'title'      => 'Complete the UI wireframes for dashboard redesign',
                'status'     => 'in-progress',
                'task_date'  => $today,
                'created_at' => $now,
            ],
            [
                'title'      => 'Write unit tests for authentication module',
                'status'     => 'pending',
                'task_date'  => $today,
                'created_at' => $now,
            ],
            [
                'title'      => 'Deploy staging environment updates',
                'status'     => 'completed',
                'task_date'  => $today,
                'created_at' => $now,
            ],
            // Yesterday's tasks
            [
                'title'      => 'Set up CI/CD pipeline for the new microservice',
                'status'     => 'completed',
                'task_date'  => $yesterday,
                'created_at' => $now,
            ],
            [
                'title'      => 'Optimize database queries for reporting module',
                'status'     => 'completed',
                'task_date'  => $yesterday,
                'created_at' => $now,
            ],
            // Two days ago
            [
                'title'      => 'Draft technical documentation for REST API endpoints',
                'status'     => 'completed',
                'task_date'  => $twoDaysAgo,
                'created_at' => $now,
            ],
            // Tomorrow
            [
                'title'      => 'Conduct code review meeting with the backend team',
                'status'     => 'pending',
                'task_date'  => $tomorrow,
                'created_at' => $now,
            ],
            [
                'title'      => 'Prepare presentation slides for sprint retrospective',
                'status'     => 'pending',
                'task_date'  => $tomorrow,
                'created_at' => $now,
            ],
            [
                'title'      => 'Refactor user notification service for scalability',
                'status'     => 'in-progress',
                'task_date'  => $today,
                'created_at' => $now,
            ],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}
