<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return new TaskCollection(Task::all());
    }

    public function store(UpdateTaskRequest $request)
    {
        $task = $this->taskService->create($request->validated());

        return new TaskResource($task);
    }

    public function update(Task $task, UpdateTaskRequest $request)
    {
        $this->taskService->update($task, $request->validated());

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $this->taskService->delete($task);

        return response()->json();
    }
}
