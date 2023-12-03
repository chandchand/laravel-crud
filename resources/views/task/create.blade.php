@extends('layouts.app')

@section('content')
    <div class="container px-4">
        <div class="row">
            <div class="col-12 py-4 px-0">
                <h6 class="card-title bg-light bg-gradient border-top border-bottom py-3 text-uppercase">
                    <i class="fa fa-plus me-1"></i> <span class="fw-bold">Add Task</span>
                </h6>

                <!-- Task Creation Form -->
                <form action="{{ route('tasks.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection