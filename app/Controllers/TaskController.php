<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    protected TaskModel $taskModel;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    /**
     * Today's Tasks — Homepage view.
     * Route: /
     */
    public function today()
    {
        $tasks = $this->taskModel->getTodayTasks();
        $user  = $this->userModel->getDemoUser();

        $data = [
            'title'       => "Today's Tasks",
            'tasks'       => $tasks,
            'user'        => $user,
            'activeRoute' => '/',
            'todayDate'   => date('l, F j, Y'),
        ];

        return view('layouts/main', $data + ['content' => view('tasks/today', $data)]);
    }

    /**
     * All Tasks — chronological listing.
     * Route: /tasks
     */
    public function index()
    {
        $tasks = $this->taskModel->getAllTasksOrdered();
        $user  = $this->userModel->getDemoUser();

        // Group tasks by date for visual grouping
        $groupedTasks = [];
        foreach ($tasks as $task) {
            $groupedTasks[$task['task_date']][] = $task;
        }

        $data = [
            'title'        => 'All Tasks',
            'tasks'        => $tasks,
            'groupedTasks' => $groupedTasks,
            'user'         => $user,
            'activeRoute'  => '/tasks',
        ];

        return view('layouts/main', $data + ['content' => view('tasks/index', $data)]);
    }
}
