@extends('layout.layout_user')

@section('title','Form User')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Form Entry
            </div>
            <div class="card-body">
                <form action="/user-management/store" method="POST">
                    @csrf
                <div class="col-lg-10 row mb-3">
                    <label for="name" class="form-label col-lg-4 d-flex align-items-center">Name<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Input Name" value="{{ old('judul'); }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-10 row mb-3">
                    <label for="email" class="form-label col-lg-4 d-flex align-items-center">Email<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Input Email" value="{{ old('email'); }}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-10 row mb-3">
                    <label for="role" class="form-label col-lg-4 d-flex align-items-center">Role<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-select" name="role">
                            <option selected>Open this select menu</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                          </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection