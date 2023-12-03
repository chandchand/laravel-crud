<?php

namespace App\Repositories;

use App\Models\TaskModel;

class TaskRepository
{
    public function forUser($user, $search = null)
    {
        $tasks = $user->tasks();
    
        if ($search) {
            $tasks->where('name', 'like', '%' . $search . '%');
        }
    
        return $tasks->orderBy('created_at', 'asc')->get();
    }

    public function createTask($user, array $data)
    {
        return $user->task()->create($data);
    }

    public function findTaskById($taskId)
    {
        return TaskModel::findOrFail($taskId);
    }

    public function updateTask($task, array $data)
    {
        $task->update($data);
    }

    public function deleteTask($task)
    {
        $task->delete();
    }

}
