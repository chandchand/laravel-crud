<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\CreateTaskRequest; // You may need to create this request class
use App\Models\TaskModel;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $tasks = $this->taskRepository->forUser($request->user(), $search);

        return view('task.index', [
            'tasks' => $tasks,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Logika untuk menyimpan tugas ke database
        TaskModel::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(), // Sesuaikan dengan struktur database Anda
        ]);
    
        return redirect('/task')->with('success', 'Task berhasil ditambahkan!');
    }

    public function show(TaskModel $id)
    {
        // Add authorization check if needed
        return view('task.show', compact('tasks'));
    }

    public function edit($id)
    {
        $task = TaskModel::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = TaskModel::findOrFail($id);
        $task->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect('/task')->with('success', 'Task updated successfully!');
    }


    public function destroy(TaskModel $id)
    {
        // Add authorization check if needed
        $id->delete();

        return redirect(route('tasks.index'));
    }
}
