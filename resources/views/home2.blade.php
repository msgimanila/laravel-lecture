@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
					<li><a href={{ URL::to('/lectures') }}>LECTURES</a></li>
					<li><a href={{ URL::to('/payments') }}>PAYMENT</a></li>
					<li><a href={{ URL::to('/courses') }}>COURSES</a></li>
					<li><a href={{ URL::to('/enrollments') }}>ENROLLMENTS</a></li>
					<li><a href={{ URL::to('/makecourses') }}>MAKE COURSES</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
