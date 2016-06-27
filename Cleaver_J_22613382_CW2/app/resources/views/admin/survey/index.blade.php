@extends('../../layouts/admin-master')

@section('title' , 'Admin Survey')

@section('content')
<!-- This is the homepage (My Survey) for the Admin user containing all of their created questionnaires in a table -->
    <h1>My Surveys</h1>

    <table class="table">
        <tr>
            <th>Survey Title</th>
            <th>Created At</th>
            <th style="text-align:center">View/Delete</th>
        </tr>

        @foreach($surveys as $survey) <!-- This foreach works on getting the correct survey information from the
                                           database using the $survey variables -->
            <tr>
                <td>{{$survey->name}}</td>
                <td>{{$survey->created_at}}</td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="/admin/survey/{{$survey->id}}"><div class="btn btn-block btn-default" style="margin-left:10px;">View</div></a>
                        </div>
                        <div class="col-md-6">
<!-- This form is containing the delete button and linking to the destroy method within the SurveyController -->
                           {{ Form::open(array('route' => ['admin.survey.destroy', $survey->id] , 'method' => 'delete', 'onSubmit' => 'return confirmDelete();')) }}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                            {{Form::close()}}
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
    </table>
    <script>
        function confirmDelete(){
            return confirm("Are you sure you want to delete?")
        }
    </script>
<!-- The above script tag contains the confirm delete function which returns a message to the user asking if they are
sure they want to delete -->
    @stop