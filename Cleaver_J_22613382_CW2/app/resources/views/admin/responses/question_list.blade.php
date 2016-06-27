@extends('../../layouts/admin-master')

@section('title', 'Questions')

@section('content')
<!-- This blade for the list of questions allowing the user to click the view (eye) icon to see the number of responses
per option -->
    <h1>Questions</h1>
        <table class="table">
            <tr>
                <th>Question</th>
                <th>View</th>
            </tr>
            @foreach($questions as $question)
            <tr>
                <td>{{$question->name}}</td>
                <td><a href="/admin/responses/{{$question->id}}"><div class="glyphicon glyphicon-eye-open" style="margin-left:10px;"></div></a></td>
            </tr>
                @endforeach
        </table>
    @stop