@extends('layouts.base')


@section('my_content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="padding-top: 10px;">
                <form class="was-validated" method="post" action="/tasks/add">
                    {{ csrf_field() }}


                    <div>
                        <input name="title" type="text" class="form-control" id="inputPassword" value="{{ $zadanie->title }}" required>
                    </div>

                    <div style="padding-bottom: 20px;"></div>

                    <div class="mb-3">
                        <textarea rows="4" cols="50" name="description" class="form-control" id="validationTextarea" required>{{ $zadanie->description }}</textarea>
                    </div>


                    <button type="submit" class="btn btn-large btn-block btn-primary">EDIT</button>
                    <a href="{{ url('/tasks') }}" <button type="submit" class="btn btn-large btn-block btn-secondary">Cancel</button></a>
                </form>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

@endsection
