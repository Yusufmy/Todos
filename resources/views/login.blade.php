@extends('layout')

@section('controller')
    <section id="login">
        <form method="POST" action="/login/auth">
            <div class="container ">
                <div class="row justify-content-center" style="margin-top: 100px; margin-right:80px">
                    <div class="col-md-4">
                        <div class="card border border-primary"
                            style="margin-top: 100px; border-radius: 12px;
                background: #a9d9e5;
                box-shadow: inset -9px 9px 0px #44575c,
                            inset 9px -9px 0px #ffffff;">
                            {{-- Mengambil dan mengirim data input ke controller yang nantinya diambil oleh Request $request --}}
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('notAllowed'))
                                <div class="alert alert-danger">
                                    {{ session('notAllowed') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="login text-center" style="margin-top: 50px">
                                <h3>Login</h3>
                            </div>
                            <div class="card-body" style="margin-top: 10px">
                                <div class="col-auto mt-3">
                                    <label class="visually-hidden" for="usergroup">username</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-person-heart"></i></div>
                                        <input type="text" class="form-control" id="usergroup" placeholder="username"
                                            name="username">
                                    </div>
                                </div>
                                <div class="col-auto mt-3">
                                    <label class="visually-hidden" for="usergroup">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-fingerprint"></i></div>
                                        <input type="password" class="form-control" id="usergroup" placeholder="password"
                                            name="password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                <div class="sigUp justify-content-center">
                                    <p class="text-center mt-3">Tidak Punya Akun?<a href="{{ route('register-page') }}"
                                            style="color :black">register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
