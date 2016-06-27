@extends('../../layouts/admin-master')

@section('title', 'Show Responses')

@section('content')
<!-- Here is the show blade that gets the question name from the database and uses for loops to increase the size
starting at 0 depending on the number of responses. The responses are gathered using the options array and responses
array. -->
    <h1>{{ $question->name }}</h1>

    <table class="table">
        <tr>
            <th>Option</th>
            <th>Amount</th>
        </tr>

        @for($idx = 0; $idx<$size; $idx++)
            <tr>
                <td>{{$o_array[$idx]}}</td>
                <td>{{$r_array[$idx]}}</td>
            </tr>
        @endfor
    </table>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <a href="/admin/responses/survey" class="btn btn-primary">Back</a>
        </div>
    </div>
    @stop