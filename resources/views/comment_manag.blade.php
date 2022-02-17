@extends('layout.layout_user')

@section('title','Comment Management')

@section('content')
<div class="row mb-2">
    <div class="col-12">
        <h3>Entry Management</h3>
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
                @if ($comment->count() != 0)
                    
                    @foreach ($comment as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <p class="fw-bold mb-0" style="margin-top: 16px;">{{ $item['nama'] }}</p>
                            <p><i>{{ $item['email'] }}</i></p>
                            <p>{{ $item['isi'] }}</p>
                            <p>Tanggal: <i>{{ $item['created_at'] }}</i></p>
                        </div>
                        @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                            
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                            <a href="/comment-manag/delete/{{ $item['id'] }}" id="delete" class="btn btn-danger">Delete</a>
                        </div>
                        @endif
                    </li>
                    @endforeach
                @else
                    <li class="list-group-item d-flex justify-content-center align-items-center">
                        <p class="text-danger">Entry no comments</p>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endsection