@extends('layout')

@section('controller')
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Profile</h1>
                        @csrf
                        @if (is_null(Auth::user()->image_profile))
                            <img src="{{ asset('assets/img/profile.png') }}" alt="" srcset=""
                                style="border-radius: 50%" class="d-block m-auto">
                        @else
                            <img src="{{ asset('assets/img/' . Auth::user()->image_profile) }}" alt=""
                                srcset="" style="border-radius: 50%" class="d-block m-auto">
                        @endif
                        <div class="d-flex">
                            <a href="{{ route('todo.profile.upload') }}" class="btn btn-primary">Ubah Foto Profile</a>
                        </div>
                    </div>
                    <ul style="list-style:none">
                        <li>Username : {{ Auth::user()->username }}</li>
                        <li>Name : {{ Auth::user()->name }}</li>
                        <li>Email : {{ Auth::user()->email }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
