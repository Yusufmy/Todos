@extends('layout')

@section('controller')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card rounded mx-auto d-block" style="width: 400px">
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
                    <div class="col-20">
                        <ul style="list-style:none">
                            <h5 class="bi bi-person-fill"> Username</h5>
                            <hr style="width: 50px;position:absolute;margin-top:22px;margin-left:25px">
                            <li class="ms-4">{{ Auth::user()->username }}</li>
                            <h5 class="mt-3 bi bi-person-lines-fill"> Name</h5>
                            <hr style="width: 50px;position:absolute;margin-top:22px;margin-left:25px">
                            <li class="ms-4">{{ Auth::user()->name }}</li>
                            <h5 class="mt-3 bi bi-envelope-fill"> Email</h5>
                            <hr style="width: 50px;position:absolute;margin-top:22px;margin-left:25px">
                            <li class="ms-4">{{ Auth::user()->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
