@extends('layout')

@section('controller')
    <div class="container">
        <div class="row mt-5 p-5">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('j F, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="/dashboard">Kembali</a>
            </div>
        </div>
    </div>
@endsection
