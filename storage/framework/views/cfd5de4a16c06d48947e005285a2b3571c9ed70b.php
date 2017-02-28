<?php $__env->startSection('content'); ?>
<div style="width: 80%; margin: auto;">
<?php 
echo Form::open(['action' => 'LectureController@store', 'method' => 'post']);
echo "<label>order</label>";
echo "<br>";
echo Form::text('order'); 
echo "<br>";
echo "title";
echo "<br>";
echo Form::text('title');
echo "<br>";
echo "description";
echo "<br>";
echo Form::text('description');
echo "<br>";
echo "URL";
echo "<br>";
echo Form::text('URL');
echo "<br>";
echo "created_at";
echo "<br>";
echo Form::text('created_at', '2000-02-01 00:00:00');
echo "<br>";
echo "updated_at";
echo "<br>";
echo Form::text('updated_at', '2000-02-01 00:00:00');
echo "<br>";
echo "course_id";
echo "<br>";
echo Form::text('course_id');
echo "deleted_at";
echo "<br>";
echo Form::text('deleted_at', '2000-02-01 00:00:00');
echo "sample";
echo "<br>";
echo Form::text('sample');

echo Form::submit('Click Me!');
?>
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>