<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TaskModel;

class UserController extends BaseController
{
    protected UserModel $userModel;
    protected TaskModel $taskModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }

    /**
     * Profile page — displays user info and task stats.
     * Route: /profile
     */
    public function index()
    {
        $user  = $this->userModel->getDemoUser();
        $tasks = $this->taskModel->findAll();

        // Calculate statistics
        $totalTasks     = count($tasks);
        $completedTasks = count(array_filter($tasks, fn($t) => $t['status'] === 'completed'));
        $pendingTasks   = count(array_filter($tasks, fn($t) => $t['status'] === 'pending'));
        $inProgress     = count(array_filter($tasks, fn($t) => $t['status'] === 'in-progress'));

        $data = [
            'title'          => 'User Profile',
            'user'           => $user,
            'activeRoute'    => '/profile',
            'totalTasks'     => $totalTasks,
            'completedTasks' => $completedTasks,
            'pendingTasks'   => $pendingTasks,
            'inProgress'     => $inProgress,
        ];

        return view('layouts/main', $data + ['content' => view('user/profile', $data)]);
    }
}
