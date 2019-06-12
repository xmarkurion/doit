@extends('layouts.base')


@section('my_content')

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light bg-light" style="width: 100%; display: block !important;">

                <a class="navbar-brand">Welcome, {{ Auth::user()->name }} </a>
                <a href="{{ url('/tasks/add/') }}"><button class="btn btn-outline-success" type="button" style="padding-right: 10px">Add New Task</button></a>
                <button class="btn btn-outline-dark" type="button" style="padding-right: 10px">Archive</button>
                <a href="{{ route('logout') }}" class=""><button style="margin-top: 5px;" class="btn btn-outline-secondary float-right" type="button">Logout</button></a>

            </nav>
        </div>

        <div class="row">

                            <table class="table border table-white">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Done</th>
                                    <th scope="col">Archive</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($zadania as $zadanie)

                                @if($zadanie->status == 0)
                                    <tr style="background: whitesmoke">
                                        <th scope="row">{{ $zadanie->id }}</th>
                                        <td>{{ $zadanie->title }}</td>
                                        <td>{{ $zadanie->description }}</td>
                                        <td>{{ $zadanie->created_at }}</td>
                                        <td><button type="button" href="#" class="btn btn-success">Done</button></td>
                                        <td><button type="button" href="#" class="btn btn-danger">Archive</button></td>
                                    </tr>
                                @else
                                    <tr style="background: lightgreen">
                                        <th scope="row">{{ $zadanie->id }}</th>
                                        <td>{{ $zadanie->title }}</td>
                                        <td>{{ $zadanie->description }}</td>
                                        <td>{{ $zadanie->created_at }}</td>
                                        <td><button type="button" href="#" class="btn btn-secondary">Back</button></td>
                                        <td><button type="button" href="#" class="btn btn-danger">Archive</button></td>
                                    </tr>
                                @endif

                            @endforeach
                                </tbody>
                            </table>
        </div>
</div>
@endsection
