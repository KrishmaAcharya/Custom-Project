@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1>User Profile</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Profile Information</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name:</strong> {{ Auth::user()->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                <li class="list-group-item"><strong>Registered At:</strong> {{ Auth::user()->created_at->format('d-m-Y') }}</li>
            </ul>

            <!-- Display Profile Image if Available -->
            @if (Auth::user()->profile_image)
                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" style="width: 150px; height: 150px;" class="mt-3">
            @else
                <p class="mt-3">No profile image uploaded.</p>
            @endif

            <!-- Edit Profile Button -->
            <a href="{{ route('edit.profile') }}" class="btn btn-primary mt-3">Edit Profile</a>

            <!-- Profile Image Upload Form -->
            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="profile_image">Upload Profile Image</label>
                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
