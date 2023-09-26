<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <h1>Dashboard</h1>
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
        <li><a href="#">Tasks</a></li>
        <li><a href="#">Messages</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
</aside>

<main class="content">
    <h2>Welcome to your Dashboard</h2>
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
