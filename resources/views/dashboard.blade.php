@extends('layout')

@section('controller')
    <section id="dashboard">
        <div class="wrapper bg-white shadow p-3 mb-5 bg-body rounded" style="margin-top: 100px; margin-left:150px">
            @if (Auth::user()->role == 'admin')
                <div class="d-flex justify-content-center">
                    <a href="{{ '/data' }}" class="btn btn-primary">Lihat Data Pengguna</a>
                </div>
            @else
                @if (session('notAllowed'))
                    <div class="alert alert-danger">
                        {{ session('notAllowed') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('successUpdate'))
                    <div class="alert alert-success">
                        {{ session('successUpdate') }}
                    </div>
                @endif
                @if (session('successUpdate'))
                    <div class="alert alert-success">
                        {{ session('successUpdate') }}
                    </div>
                @endif
                {{ csrf_field() }}
                {{-- Mengambil dan mengirim data input ke controller yang nantinya diambil oleh Request $request --}}
                @csrf
                <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex flex-column">
                        <div class="h5">My Todo's</div>
                        <p class="text-muted text-justify">
                            Here's a list of activities you have to do
                        </p>
                        <br>
                        <span>
                            <a style="text-decoration: none" href="/create" class="text-success">Create</a> <a
                                style="text-decoration: none" href="#">Complated</a>
                        </span>
                    </div>
                    <div class="info btn ml-md-4 ml-0">
                        <span class="fas fa-info" title="Info"></span>
                    </div>
                </div>
                <div class="work border-bottom pt-3">
                    <div class="d-flex align-items-center py-2 mt-1">
                        <div>
                            <span class="text-muted fas fa-comment btn"></span>
                        </div>
                        <div class="text-muted">2 todo</div>
                        <button class="btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                            data-target="#comments" aria-expanded="false" aria-controls="comments"
                            style="margin-left: 330px"></button>
                    </div>
                </div>
                <div id="comments" class="mt-4">
                    {{-- looping data-data compact 'todo' agar dapat ditampilkan per baris datanya --}}
                    @foreach ($todo as $item)
                        <div class="comment d-flex align-items-start mt-3">
                            <div class="mr-2">
                                @if ($item['status'] == 1)
                                    <span class="fa-solid fa-bookmark text-secondary btn"></span>
                                @else
                                    <form action="{{ route('complated.io', $item->id) }} " method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="fas fa-circle-check text-success btn"></button>
                                    </form>
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                {{-- path yang {id} dikirim data dinamis (data dari db) makanya disitu pake {{}} --}}
                                <a style="text-decoration:none" href="/edit/ {{ $item->id }}"
                                    class="text-justify text-black">
                                    {{-- menampilkan data dinamis / data yang diambil dari db pada blade harus menggunakan {{}} --}}
                                    {{ $item->title }}
                                </a>
                                </b>
                                <p class="text-black">{{ $item->description }}</p>
                                {{-- konsep ternary : if column status baris ini isinya 1 bakal munculin text 'Complated' selain dari itu akan menampilkan 'On-Proses' --}}
                                <p class="text-black">
                                    {{ $item->status == 1 ? 'Complated' : 'On-proses' }}
                                    {{-- Carbon itu package laravel untuk mengelola yang berhubungan dengan date. Tdainya value column date di db kan bentuknya format 2022-11-22 nah kita pengen ubah bentuk formatnyanya jadi 22-11-22 --}}
                                    <span class="date">
                                        @if ($item['status'] == 1)
                                            selesai pada :
                                            {{ \Carbon\Carbon::parse($item['done_time'])->format('j F, Y') }}
                                        @else
                                            Target : {{ \Carbon\Carbon::parse($item['done_time'])->format('j F, Y') }}
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="ml-md-4 ml-0">
                                <form action="{{ route('update-complated', $item->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" class="fas fa-arrow-right btn"></span>
                                </form>
                            </div>
                            <form action="{{ route('delete.io', $item->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="fas fa-trash text-danger btn"></button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
    </section>
@endsection
