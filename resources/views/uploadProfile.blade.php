@extends('layout')

@section('controller')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-4">
                <form action="{{ route('todo.profile.change') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="">Pilih Gambar</label>
                        <input type="file" name="image_profile" class="form-control" id="image_upload">
                    </div>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                    <a class="btn btn-secondary" href="/profile">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
