<!-- resources/views/task/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container px-4">
        <div class="row">
            <div class="col-12 py-4 px-0">
                <h6 class="card-title bg-light bg-gradient border-top border-bottom py-3 text-uppercase">
                    <i class="fa fa-pencil me-1"></i> <span class="fw-bold">Edit Task</span>
                </h6>

                <!-- Task Update Form -->
                <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
