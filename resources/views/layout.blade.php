<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
    <title>Todos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            @auth
                <a class="navbar-brand" href="/dashboard">Todo App </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user()->role == 'user')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">My Todo's</a>
                            </li>
                        @endif
                </div>
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (is_null(Auth::user()->image_profile))
                                    <img src="{{ asset('assets/img/profile.png') }}" alt="" srcset=""
                                        style="border-radius: 50%" class="img-fluid" width="30px">
                                @else
                                    <img src="{{ asset('assets/img/' . Auth::user()->image_profile) }}" alt=""
                                        srcset="" style="border-radius: 50%" class="img-fluid"
                                        width="30px">
                                @endif
                                {{ Auth::user()->username }}
                            </button>
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1 ">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                @if (Auth::user()->role == 'admin')
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="/data">users</a>
                                    </li>
                                @endif
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item bi bi-box-arrow-in-right" type="submit">Logout</button>
                                </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="navbar-nav ms-auto bi bi-person-gear">
                        {{-- <div class="nameuser mt-2 text-white">
                            {{ Auth::user()->username }}
                        </div> --}}
                    @else
                        <a class="navbar-brand" href="/dashboard">Todo App </a>
                    @endauth
                </ul>
            </div>
        </div>
        </div>
    </nav>
    @yield('controller')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
