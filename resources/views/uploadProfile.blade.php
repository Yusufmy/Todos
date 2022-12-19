@extends('layout')

@section('controller')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="">Pilih Gambar</label>
                        <input type="file" name="image_profile" class="form-control" id="image_upload">
                    </div>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                    <a class="btn btn-secondary" href="/todo/profile">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
