@extends('layouts')

@section('content')
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="card px-2">

            <div class="card-header">
                <h5 class="fw-bold card-title">User Registration</h5>
            </div>

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name">

                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email">

                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">password</label>
                <input type="text" class="form-control" placeholder="Password" name="password">

                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone Number" name="phoneNumber">

                @error('phoneNumber')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer mt-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

    </div>

    {{-- Render users records --}}
    <ul>
        @forelse ($users as $user)
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
            <li>{{ $user->phone_number }}</li>
            <br>
        @empty
            <li>No data found!</li>
        @endforelse
    </ul>
@endsection