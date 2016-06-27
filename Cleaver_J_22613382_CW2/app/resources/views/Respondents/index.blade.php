@extends('../layouts/frontend-layout')
<!-- This extends the front-end layout created for the respondents -->
@section('title' , 'Survey')

@section('survey_details') <!-- Here is where the associated survey name and description is called from the database -->
    <h1>{{$survey->name}}</h1>
    <p>{{$survey->description}}</p>
@stop

@section('content')<!-- This is the form for choosing the multiple choice answers -->
    <div class="well well-lg" style="margin-top:50px">
        <h2>{{$question->name}}</h2> <!-- The question name is gathered from the $question variable -->
        {{ Form::open(array('url' => "respondent/$survey->id/$question->id")) }}
        @foreach($options as $option)
            @if($option->q_id == $question->id) <!-- If the option in the question id is equal to the question id
                                                then the form will commence using radio and label to display the
                                                options-->
                {{ Form::radio('o_id' , $option->id, false, ['class' => '']) }}
                {{ Form::label('o_id' , $option->name . ' ') }}
                <br>
            @endif
        @endforeach
        {{ Form::submit('Next', ['class' => 'btn btn-success']) }}
    </div>
@stop