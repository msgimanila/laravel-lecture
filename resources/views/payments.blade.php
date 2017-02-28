@extends('layouts.app')

@section('content')
<div style="width: 80%; margin: auto;">
<?php 
echo Form::open(['action' => 'PaymentController@store', 'method' => 'post']);
 
echo "created_at";
echo "<br>";
echo Form::text('created_at', '2000-02-01 00:00:00');
echo "<br>";
echo "updated_at";
echo "<br>";
echo Form::text('updated_at', '2000-02-01 00:00:00');
echo "<br>";
echo "user_id";
echo "<br>";
echo Form::text('user_id');
echo "<br>";
echo "deleted_at";
echo "<br>";
echo Form::text('deleted_at', '2000-02-01 00:00:00');
echo "<br>";
echo "enrollment_id";
echo "<br>";
echo Form::text('enrollment_id');

echo Form::submit('Click Me!');
?>
</div>
 @endsection