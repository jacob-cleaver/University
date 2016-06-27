@extends('../../layouts/admin-master')

@section('title', 'Responses')

@section('content')
    <!-- This is the HTML for the responses index page structuring via the use of tables -->

    <h1>Responses</h1>

    <table class="table">
        <tr>
            <th>Survey</th>
            <th>Created At</th>
            <th>View Responses</th>
        </tr>

        @foreach($surveys as $survey)
            <tr>
                <td>{{$survey->name}}</td>
                <td>{{$survey->created_at}}</td>
                <td><a href="/admin/responses/question/{{$survey->id}}" class="glyphicon glyphicon-eye-open" style="margin-left:50px;"></a></td><!-- This is the view button for the response of the chosen question styled with an 'eye' icon -->
            </tr>
        @endforeach
    </table>
@stop