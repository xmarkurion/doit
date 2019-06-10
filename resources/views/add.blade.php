@extends('layouts.base')


@section('my_content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="padding-top: 10px;">
            <form class="was-validated">
                <div>
                    <input name="title" type="text" class="form-control" id="inputPassword" placeholder="Please enter a title" required>
                </div>

                <div style="padding-bottom: 20px;"></div>

                <div class="mb-3">
                    <textarea rows="4" cols="50" name="description" class="form-control" id="validationTextarea" placeholder="Please enter a task description" required></textarea>
                </div>

                <button type="submit" class="btn btn-large btn-block btn-primary">SAVE</button>
                <button type="submit" class="btn btn-large btn-block btn-secondary">Cancel</button>
            </form>
             <div class="col-md-2"></div>
        </div>
        </div>
    </div>

@endsection
