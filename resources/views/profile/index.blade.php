<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
@include('navbar')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-picture-container">
                @if(Auth::user()->profile_picture)
                    <img class="image rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
                @else
                    <p>No profile picture</p>
                @endif
                <form method="POST" action="{{ route('profile.upload-picture') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="profile_picture" name="profile_picture" class="form-control mt-2">
                    <button type="submit" class="btn btn-primary mt-2">Upload Picture</button>
                </form>
            </div>
        </div>
        <div class="col-md-8 profile-info">
            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
            <p>Email: {{ Auth::user()->email }}</p>
            <p>Birthday: {{ Auth::user()->birthday }}</p>
            <p>Phone Number: {{ Auth::user()->phone_number }}</p>
            <p>Profession: {{ Auth::user()->profession }}</p>
        </div>
    </div>
</div>
</body>
</html>

