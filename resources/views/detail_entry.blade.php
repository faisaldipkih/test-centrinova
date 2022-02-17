@extends('layout.layout_user')

@section('title','Detail Entry')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h1>{{ $detail['judul'] }}</h1>
            </div>
            <div class="col-12 mb-3">
                <img src="{{ asset('storage/images/'.$detail['img']) }}" alt="Judul" class="w-100" height="500">
            </div>
            <div class="col-12">
                {{ $detail['isi_entry'] }}
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Komentar
                    </div>
                    <div class="card-body">
                        @if ($comments->count() == 0)
                            <p class="text-danger text-center">Belum ada komentar</p>
                        @else    
                            @foreach ($comments as $item)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <p class="text-uppercase fw-bold">{{ $item['nama'] }}</p>
                                    <p>{{ $item['isi'] }}</p>
                                    <p class="fst-italic fw-light">{{ $item['created_at'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {!! $comments->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-50">
                    <div class="card-body">
                        <form action="/comment/store" method="POST">
                            @csrf
                            <input type="hidden" name="entry_id" value="{{ $detail['id'] }}">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                                @error('nama')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Komentar</label>
                                <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
                                @error('isi')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection