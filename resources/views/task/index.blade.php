<!-- resources/views/task/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container px-4">
        <div class="row">


            @if (!is_null($tasks) && count($tasks) > 0)
                <div class="col-12 py-4 px-0">
                    <div class="mb-3">    
                        <h6 class="card-title bg-light bg-gradient border-top border-bottom py-3 text-uppercase ">
                            <i class="fa fa-list me-1"></i> <span class="fw-bold">Tasks List Data</span>
                        </h6>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('tasks.create') }}" class="btn btn-success">
                            <i class="fa fa-plus me-1"></i> Add Task
                        </a>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('tasks.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search tasks" value="{{ $search }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <th class="col-1">ID</th>    
                                <th class="col-3">Task Name</th>
                                <th class="col-5">Description</th>
                                <th class="col-3" colspan="2"><i class="fa fa-gear"></i> <span class="d-none d-md-inline">Manage</span></th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="text-center"><div>{{ $task->id }}</div></td>
                                        <td><div>{{ $task->name }}</div></td>
                                        <td><div>{{ $task->description }}</div></td>
                                        <td class="text-end">
                                            <form action="{{ url('task/' . $task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash me-md-1"></i> <span class="d-none d-md-inline">Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-start">
                                            <form action="{{ url('task/' . $task->id . '/edit') }}" method="GET">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-edit me-md-1"></i> <span class="d-none d-md-inline">Edit</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="mb-3">
                    <a href="{{ route('tasks.create') }}" class="btn btn-success">
                        <i class="fa fa-plus me-1"></i> Add Task
                    </a>
                </div>
                <p>No tasks found.</p>
            @endif
        </div>
    </div>
@endsection
