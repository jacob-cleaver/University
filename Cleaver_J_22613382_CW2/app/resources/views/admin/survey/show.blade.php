@extends('../../layouts/admin-master')

@section('title', "$survey->name")

@section('content')

    <h1>{{$survey->name}}</h1>
    <p>{{$survey->description}}</p>

    @if($url_q == null)<!-- This is the statement before a questionnaire has been created and therefore no URL -->
        <strong>URL: Please add a question to generate a url</strong>
    @else
        <p>URL: localhost:8000/respondent/{{$survey->id}}/{{$url_q->id}}</p><!-- This is how the URL is populated -->
        @endif

    <table class="table">
        <tr>
            <th>Question</th>
            <th>Created At</th>
            <th>Add Options</th>
        </tr>

        @foreach($questions as $question) <!-- This foreach inside the table houses the variable for the questions
        to correspond to the controller and the 'add option' button with Bootstrap success styling to send the aoption to the database.-->
            <tr>
                <td>{{ $question->name }}</td>
                <td>{{ $question->created_at }}</td>
                <td><a  href="/admin/option/{{ $question->id }}" class="btn btn-success">Add Option</a></td>
            </tr>
        @endforeach
    </table>
<!-- This form is used to add questions in the create survey -->
    {{Form::open(array('url' => "admin/question/create/" . $survey->id))}}
        {{Form::label('name', 'Question: ')}}
        {{Form::text('name', null, ['class'=>'form-control'])}}
        <div class="row">
            <div class="col-md-2 col-md-offset-4">
                {{Form::submit('Add Question', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px'])}}
            </div>
            <div class="col-md-2">
                <a href="/admin/survey" class="btn btn-primary btn-block" style="margin-top:20px">Done</a>
            </div>
        </div>
    {{Form::close()}}
    @stop