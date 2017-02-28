@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: auto;">
<?php 
echo Form::open(['action' => 'EnrollmentController@store', 'method' => 'post']);
echo "<label>status</label>";
echo "<br>";
echo Form::text('status'); 
echo "<br>";
echo "course_id";
echo "<br>";
echo Form::text('course_id');
 
echo "<br>";
echo "payment_id";
echo "<br>";
echo Form::text('payment_id');
echo "<br>";
echo "start_date";
echo "<br>";
echo Form::text('start_date', '2000-02-01 00:00:00');
echo "<br>";
echo "end_date";
echo "<br>";
echo Form::text('end_date', '2000-02-01 00:00:00');
echo "<br>";
echo "year";
echo "<br>";
echo Form::text('year');
echo "month";
echo "<br>";
echo Form::text('month');
echo "day";
echo "<br>";
echo Form::text('day');

echo Form::submit('ENROLL');
?>
</div>
 @endsection