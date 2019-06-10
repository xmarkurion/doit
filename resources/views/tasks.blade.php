@extends('layouts.base')


@section('my_content')

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Welcome, {{ Auth::user()->name }} </a>
                <button class="btn btn-outline-success" type="submit">Add New Task</button><div style="padding-right: 10px"></div>
                <button class="btn btn-outline-dark" type="submit">Archive</button><div style="padding-right: 10px"></div>
                <button class="btn btn-outline-secondary" type="submit">Logout</button>
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
                                    <th scope="col">Delete</th>
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
                                        <td><button type="button" href="#" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @else
                                    <tr style="background: lightgreen">
                                        <th scope="row">{{ $zadanie->id }}</th>
                                        <td>{{ $zadanie->title }}</td>
                                        <td>{{ $zadanie->description }}</td>
                                        <td>{{ $zadanie->created_at }}</td>
                                        <td><button type="button" href="#" class="btn btn-secondary">Back</button></td>
                                        <td><button type="button" href="#" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @endif

                            @endforeach
                                </tbody>
                            </table>
        </div>
</div>
@endsection
