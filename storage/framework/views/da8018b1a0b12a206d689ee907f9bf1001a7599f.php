<?php $__env->startSection('content'); ?>
<div style="width: 80%; margin: auto;">
<?php 
echo Form::open(['action' => 'CourseController@store', 'method' => 'post', 'files'=>'true']);
echo "<label>title</label>";
echo "<br>";
echo Form::text('title'); 
echo "<br>";
echo "summary";
echo "<br>";
echo Form::textarea('summary');
echo "<br>";
echo "description";
echo "<br>";
echo Form::text('description');
echo "<br>";
echo "target";
echo "<br>";
echo Form::text('target');
echo "<br>";
echo "lecture_count";
echo "<br>";
echo Form::text('lecture_count');
echo "<br>";
echo "running_time";
echo "<br>";
echo Form::text('running_time');
echo "<br>";
echo "price";
echo "<br>";
echo Form::text('price');
echo "<br>";
echo "free";
echo "<br>";
echo Form::text('free');
echo "<br>";
echo "feature";
echo "<br>";
echo Form::text('feature');
echo "<br>";
echo "objective";
echo "<br>";
echo Form::text('objective');
echo "<br>";
echo "course_url_name";
echo "<br>";
echo Form::text('course_url_name');
echo "<br>";
echo "available";
echo "<br>";
echo Form::text('available', 1);
echo "<br>";
echo Form::file('files');
echo "<br>";
 
echo Form::submit('Click Me!');
?>
  
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>