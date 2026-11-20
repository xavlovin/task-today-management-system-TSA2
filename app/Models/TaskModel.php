<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at', 'is_archived'];

    /**
     * Get tasks that are not archived (is_archived = 0).
     * If a date is given, only tasks on that date are returned.
     *
     * @return array
     */
    public function getActiveTasks(?string $date = null): array
    {
        $this->where('is_archived', 0);

        if ($date !== null) {
            $this->where('task_date', $date);
        }

        return $this->orderBy('task_date', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Find one task that is not archived. Returns null if missing or archived.
     *
     * @return array|null
     */
    public function findActive(int $id): ?array
    {
        return $this->where('is_archived', 0)->find($id);
    }
}
