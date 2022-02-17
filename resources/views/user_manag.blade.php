@extends('layout.layout_user')

@section('title','User Management')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <h3>User Management</h3>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="/form-user" class="btn btn-primary btn-sm">Tambah</a>
        </div>
    </div>
    @if (session()->has('message'))
<div class="row mb-3">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show alert-sm" role="alert">
            {{ session()->get('message'); }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
    <div class="row">
        <div class="col-12">
            <table class="table table-striped" style="width:100%" id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)    
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['role'] }}</td>
                        <td><a href="/user-management/reset/{{$item['id']}}" class="btn btn-sm btn-warning">Reset Password</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
@endsection