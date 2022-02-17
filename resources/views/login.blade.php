@extends('layout.auth_layout')

@section('title','Login')

@section('content')
<div class="card w-50 mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h3>Login</h3>
            </div>
            @if (session()->has('message'))
            <div class="row mb-2">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show alert-sm" role="alert">
                    {{ session()->get('message'); }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            </div>
            @endif
            <div class="col-12">
                <form action="/auth/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="true">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection