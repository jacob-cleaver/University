@extends('../../layouts/admin-master')

@section('title' , 'Create Survey')

@section('content')
<!-- This page holds the survey creation form, using a survey title and description -->
    <h1>Create Survey</h1>
    {{ Form::open(array('route' => 'admin.survey.store')) }}

    {{ Form::label('name', 'Survey Title: ') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}

    {{ Form::label('description', 'Description: ') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ Form::submit('Done', ['class' => 'btn btn-primary btn-block' , 'style' => 'margin-top:20px;']) }}
            <!-- The done button has used Bootstrap to style the button via the 'primary btn-block' -->
        </div>
    </div>
    {{ Form::close() }}
    @stop