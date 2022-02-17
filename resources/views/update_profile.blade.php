@extends('layout.auth_layout')

@section('title','Login')

@section('content')
<div class="card w-50 mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h3>Update Profile</h3>
            </div>
            @if (session()->has('message'))
            <div class="row mb-2">
            <div class="col-12">
                <div class="alert {{ session()->get('color') }} alert-dismissible fade show alert-sm" role="alert">
                    {{ session()->get('message'); }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            </div>
            @endif
            <div class="col-12">
                <form action="/auth/update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control" id="name" autocomplete="true" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="true" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="current-password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection