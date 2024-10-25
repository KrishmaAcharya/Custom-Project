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
            <a href="{{ route('edit.profile') }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
