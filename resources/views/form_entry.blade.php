@extends('layout.layout_user')

@section('title','Form Entry')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Form Entry
                </div>
                <div class="card-body">
                    <form action="{{ isset($entry['id'])?'/list-entry/update':'/list-entry/store' }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name="id" value="{{ $entry['id'] ?? '' }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="col-lg-10 row mb-3">
                        <label for="judul" class="form-label col-lg-4 d-flex align-items-center">Judul<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan judul" value="{{ $entry['judul'] ?? old('judul'); }}">
                            @error('judul')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-10 row mb-3">
                        <label for="isi-entry" class="form-label col-lg-4 d-flex align-items-center">Isi Entry<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <textarea name="isi_entry" id="isi-entry" cols="30" rows="10" class="form-control">{{ $entry['isi_entry'] ?? old('isi_entry') }}</textarea>
                            @error('isi_entry')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-10 row">
                        <label for="img" class="form-label col-lg-4 d-flex align-items-center">Image<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input type="file" name="img" id="img" class="form-control" placeholder="Masukan Image" value="{{ old('img') }}">
                            @error('img')    
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

@section('script')
    <script>
        $(document).ready(function () {
            ClassicEditor
        .create( document.querySelector( '#isi-entry' ) )
        .catch( error => {
            console.error( error );
        } );
        });
    </script>
@endsection