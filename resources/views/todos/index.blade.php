@extends('layouts')

@section('content')



<div class="row">
    <div class="col-xl-6 m-auto">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @elseif ($message = Session::get('error'))
            <div class="alert alert-danger">{{ $message }}</div>
        @endif

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            {{-- title --}}
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" placeholder="Title" id="title" name="title">

                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" placeholder="Description" id="description" name="description">

                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        {{-- List out the todos --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No todo found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection