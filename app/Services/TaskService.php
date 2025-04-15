<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;

class TaskService extends BaseService
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }

    public function create(array $attributes)
    {
        $task = new Task();
        $task->fill($attributes);
        $task->user()->associate(User::find($attributes['user_id']));
        $task->save();

        return $task;
    }
}
