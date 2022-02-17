@extends('layout.layout_user')

@section('title','List Entry')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <h3>Entry Management</h3>
            <a href="/form-entry" class="btn btn-primary btn-sm">Tambah</a>
        </div>
    </div>
    @if (session()->has('message'))
<div class="row mb-2">
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show alert-sm" role="alert">
            {{ session()->get('message'); }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
    <div class="row mb-2">
        <div class="col-12">
            <ul class="list-group">
                @if ($entry->count() != 0)
                    @foreach ($entry as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/detail/{{ $item['slug'] }}" class="text-decoration-none text-black"><p class="fw-bold" style="margin-top: 16px;">{{ $item['judul'] }}</p></a>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                            @if (Auth::user()->id == $item['user_id'])
                                
                            <a href="/form-entry/{{ $item['slug'] }}" id="edit" class="btn btn-warning">Edit</a>
                            @endif
                            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                
                            <a href="/list-entry/delete/{{ $item['slug'] }}" id="delete" class="btn btn-danger">Delete</a>
                            @endif
                            <a href="/comment/{{ $item['id'] }}" class="btn btn-primary">Comment</a>
                        </div>
                    </li>
                    @endforeach
                @else
                <li class="list-group-item d-flex justify-content-center align-items-center">
                    <p class="text-danger">No entry</p>
                </li>
                @endif
                
              </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {!! $entry->links() !!}
        </div>
    </div>
@endsection