<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="logo" style="margin-left: 10px">
        <h2 class="username">{{ Auth::user()->name }}</h2>
    </div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/tasks">Tasks</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="{{ route('logout') }}"> Logout</a></li>
    </ul>
</nav>
    <h1 class="text-center">All Tasks</h1>
    <div class="d-flex justify-content-end" style="margin-right: 20px">
        <form method="GET" action="{{ route('tasks.index') }}" class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="sort" class="form-label">Sort by:</label>
            </div>
            <div class="col-auto">
                <select name="sort" id="sort" class="form-select" onchange="this.form.submit()">
                    <option value="priority" {{ request('sort') == 'priority' ? 'selected' : '' }}>Priority</option>
                    <option value="due_date" {{ request('sort') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                </select>
            </div>
        </form>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary ms-auto" style="float: left">Create New Task</a>

    </div>

    <div class="justify-content-center">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Priority</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->priority }}</td>
                    <td><a href="{{route('tasks.edit', $task->id)}}" class="btn btn-success">Update</a></td>
                    <td><a href="{{route('tasks.destroy', $task->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
