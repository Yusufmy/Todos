@extends('layout')

@section('controller')
<section id="register">
<form method="POST" action="{{route('register.input')}}">
    <div class="container">
        <div class="row justify-content-center" style="margin-right: 100px">
            <div class="col-4">
            <div class="card border border-primary ml-5" style="margin-top: 170px; border-radius: 12px;
            background: #a9d9e5;
            box-shadow: inset -9px 9px 0px #44575c,
                        inset 9px -9px 0px #ffffff;">
                @if (session('success'))
                   <div class="alert alert-success">
                      {{ session('status') }}
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
                @csrf
                <div style="margin-top: 50px" >
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">
                  <div class="col-auto mt-3">
                    <label class="visually-hidden" for="usergroup">Nama</label>
                    <div class="input-group">
                      <div class="input-group-text"><i class="bi bi-person-fill" style="color: blue"></i> </div>
                      <input type="text" class="form-control" id="usergroup" placeholder="name" name="name">
                    </div>
                  </div>
                  <div class="col-auto mt-3">
                    <label class="visually-hidden" for="usergroup">Email</label>
                    <div class="input-group">
                      <div class="input-group-text"><i class="bi bi-envelope-plus-fill"  style="color: blue"></i></div>
                      <input type="text" class="form-control" id="usergroup" placeholder="email" name="email">
                    </div>
                  </div>
                  <div class="col-auto mt-3">
                    <label class="visually-hidden" for="usergroup">username</label>
                    <div class="input-group">
                      <div class="input-group-text"><i class="bi bi-person-heart"  style="color: blue"></i></div>
                      <input type="text" class="form-control" id="usergroup" placeholder="username" name="username">
                    </div>
                  </div>
                  <div class="col-auto mt-3">
                    <label class="visually-hidden" for="usergroup">Password</label>
                    <div class="input-group">
                      <div class="input-group-text"><i class="bi bi-fingerprint"  style="color: blue"></i></div>
                      <input type="password" class="form-control" id="usergroup" placeholder="password" name="password">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
