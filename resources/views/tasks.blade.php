@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table border table-white">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($zadania as $zadanie)

                                @if($zadanie->status == 0)
                                    <tr style="background: whitesmoke">
                                @else
                                    <tr style="background: lightgreen">
                                @endif
                                    <th scope="row">{{ $zadanie->id }}</th>
                                    <td>{{ $zadanie->title }}</td>
                                    <td>{{ $zadanie->description }}</td>
                                    <td>{{ $zadanie->created_at }}</td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
