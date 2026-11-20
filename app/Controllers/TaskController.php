<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TaskController extends BaseController
{
    protected TaskModel $taskModel;
    protected UserModel $userModel;

    // Validation rules shared by create() and update().
    protected array $taskRules = [
        'title'     => 'required|max_length[150]',
        'task_date' => 'required|valid_date[Y-m-d]',
        'status'    => 'required|in_list[pending,in-progress,completed]',
    ];

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    /**
     * Today's Tasks — Homepage view (only active tasks dated today).
     * Route: /
     */
    public function today()
    {
        $tasks = $this->taskModel->getActiveTasks(date('Y-m-d'));
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
     * All Tasks — chronological listing (only active tasks).
     * Route: /tasks
     */
    public function index()
    {
        $tasks = $this->taskModel->getActiveTasks();
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

    /**
     * Shows the empty New Task form.
     * Route: GET /tasks/new (protected)
     */
    public function new()
    {
        $data = [
            'title'       => 'New Task',
            'user'        => $this->userModel->getDemoUser(),
            'activeRoute' => '/tasks',
            'task'        => null,
            'action'      => '/tasks',
        ];

        return view('layouts/main', $data + ['content' => view('tasks/form', $data)]);
    }

    /**
     * Validates the New Task form and saves the task.
     * Route: POST /tasks (protected)
     */
    public function create()
    {
        if (! $this->validate($this->taskRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title'      => $this->request->getPost('title'),
            'status'     => $this->request->getPost('status'),
            'task_date'  => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task added.');
    }

    /**
     * Shows the form filled with an existing task's data.
     * Route: GET /tasks/(:num)/edit (protected)
     */
    public function edit(int $id)
    {
        $task = $this->findTaskOr404($id);

        $data = [
            'title'       => 'Edit Task',
            'user'        => $this->userModel->getDemoUser(),
            'activeRoute' => '/tasks',
            'task'        => $task,
            'action'      => '/tasks/' . $task['id'] . '/update',
        ];

        return view('layouts/main', $data + ['content' => view('tasks/form', $data)]);
    }

    /**
     * Validates the Edit form and saves the changes.
     * Route: POST /tasks/(:num)/update (protected)
     */
    public function update(int $id)
    {
        $task = $this->findTaskOr404($id);

        if (! $this->validate($this->taskRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($task['id'], [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated.');
    }

    /**
     * Soft delete: sets is_archived = 1. The row stays in the database.
     * Route: POST /tasks/(:num)/delete (protected)
     */
    public function delete(int $id)
    {
        $task = $this->findTaskOr404($id);

        $this->taskModel->update($task['id'], ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task deleted.');
    }

    /**
     * Returns the active task, or shows a 404 page if it is missing or archived.
     */
    private function findTaskOr404(int $id): array
    {
        $task = $this->taskModel->findActive($id);

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return $task;
    }
}
