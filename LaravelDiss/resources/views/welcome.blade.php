@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 50px;">
            <div class="jumbotron">
                <h1>Project Bazaar!</h1>
                <p>A final year project implementing a web-based system focusing on final year project ideas.</p>
                <p><a class="btn btn-warning btn-lg" href="{{ url('/learnmore') }}" role="button">Learn more</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
