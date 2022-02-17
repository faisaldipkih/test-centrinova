@extends('layout.layout_user')

@section('title','Home User')

@section('content')
<div class="row">
    @if ($entry->count() != 0)
        @foreach ($entry as $item)
        <div class="col-md-6 col-sm-6 col-lg-3 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/images/'.$item['img']) }}" class="card-img-top" height="161" alt="...">
                <div class="card-body">
                    <a href="detail/{{$item['slug']}}" class="text-decoration-none text-black"><h5 class="card-title">{{ $item['judul'] }}</h5></a>
                    <p class="card-text">{{ substr($item['isi_entry'],0,80).' .....' }}</p>
                    <p class="text-black-50">Jumlah Komentar {{ $item->comments->count() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-12 text-center">
            <p class="text-danger">entry not available</p>
        </div>
    @endif
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {!! $entry->links() !!}
    </div>
</div>
@endsection