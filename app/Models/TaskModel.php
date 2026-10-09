<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];

    /**
     * Retrieve only tasks where task_date matches today's date.
     *
     * @return array
     */
    public function getTodayTasks(): array
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Retrieve all tasks ordered by task_date ascending.
     *
     * @return array
     */
    public function getAllTasksOrdered(): array
    {
        return $this->orderBy('task_date', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
