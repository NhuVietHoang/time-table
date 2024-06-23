<?php

namespace App\Services;

use App\Repositories\Task\TaskRepository;

class TaskService
{
    protected $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
}