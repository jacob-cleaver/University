@extends('../../layouts/admin-master)

@section('title', 'Delete Survey')

@section('content')
<!--m This blade holds the delete buttons that link to the controller to function the button -->
    <h1>{{$survey->name}}</h1>
    <p>{{$survey->description}}</p>

    <br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <p style="text-align:center">Are you sure you want to delete?</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a class="btn btn-default">No</a>

            {{ Form::open() }}
                {{ Form::submit('Yes', ['class' => 'btn btn-default']) }}
            {{ Form::close() }}
        </div>
    </div>
    @stop