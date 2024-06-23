<?php
namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository
{
    protected $model;
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

}