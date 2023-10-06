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
    <div class="logo">
    </div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#" id="logout-link">Logout</a></li>

    </ul>
</nav>

<aside class="sidebar">
    <ul class="sidebar-links">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="/tasks">Tasks</a></li>
        <li><a href="#">Messages</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
</aside>

<main class="content">
    <h1>All Tasks</h1>
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
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
{{--script for logout--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('logout-link').addEventListener('click', function (e) {
            e.preventDefault();
            fetch('{{ route('logout') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/';
                    } else {
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
</body>
</html>
