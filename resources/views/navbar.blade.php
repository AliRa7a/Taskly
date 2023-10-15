<nav class="navbar">
    <div class="logo">
    </div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/tasks">Tasks</a></li>
        <li><a href="{{ route('profile.index') }}">Profile</a></li>
        @if(Auth::user())
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->first_name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
            </div>
        </li>
        @else
            <li><a href="{{ route('login') }}">Login</a> </li>
        @endif

    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var userDropdown = document.querySelector('.dropdown-menu');
        var userLink = document.getElementById('navbarDropdown');

        if (userLink && userDropdown) {
            userLink.addEventListener('click', function (event) {
                event.preventDefault();
                userDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!userLink.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.remove('show');
                }
            });
        }
    });
</script>
<style>
    .dropdown-menu {
        --bs-dropdown-min-width: 0rem !important;
        --bs-dropdown-item-padding-x: 0rem !important;
        --bs-dropdown-item-padding-y: 0rem !important;
    }
</style>
