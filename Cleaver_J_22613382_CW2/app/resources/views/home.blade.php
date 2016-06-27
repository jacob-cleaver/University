@extends('layouts.app')
<!-- home blade.php is the HTMl page containing the login styling, it extends the layout.app
and uses a section that calls a an area from within the master blade. Within the section, there has
been the use of 5 divs to structure the login page.-->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
