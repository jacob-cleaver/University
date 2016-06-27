<!-- This blade extends the master blade format and focuses on creating options for the question -->
@extends('../../layouts/admin-master')

@section('title', 'Create Option')

@section('content')

    <h1>{{$question->name}}</h1>

    @foreach($options as $option)<!-- This foreach function is displaying the option name if the the option from the
    question id (q_id) is the same as the question id -->
        @if($option->q_id == $question->id)
            <p>{{$option->name}}</p>
        @else
            <p>No Options Created</p>
        @endif
    @endforeach

<!-- Below is the form for the layout keeping a structure for creating options, using buttons to link to associate with the needed variable and the correct database -->
    {{Form::open(array('url' => 'admin/option/'.$question->id))}}
        {{Form::label('name', 'Option: ')}}
        {{Form::text('name', null, ['class' => 'form-control'])}}
        <div class="row">
            <div class="col-md-2 col-md-offset-4">
                {{Form::submit('Add Option', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px'])}}
            </div>
            <div class="col-md-2">
                <a href="/admin/survey" class="btn btn-primary btn-block" style="margin-top:20px">Done</a>
            </div>
        </div>
    {{Form::close()}}
    @stop