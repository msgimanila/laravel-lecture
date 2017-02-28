<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import  url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body> 
	<div class="welcome">
		
		<h1>post2 VIEW</h1>
   <input type="button" value="Get and parse JSON" class="button" />
    <br />
    <span id="results"></span>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>

        //When DOM loaded we attach click event to button
        $(document).ready(function() {
            
            //after button is clicked we download the data
            $('.button').click(function(){

                //start ajax request
                $.ajax({
                    url: "http://localhost/laravel/resources/views/parse.json",
                    //force to handle it as text
                    dataType: "text",
                    success: function(data) {
                        
                        //data downloaded so we call parseJSON function 
                        //and pass downloaded data
                        var json = $.parseJSON(data);
                        //now json variable contains data in json format
                        //let's display a few items
                         $('#results').html('Plugin name: ' + json.name + '<br />Author: ' + json.author.name);
                    }
                });
            });
        });
    </script>
	 
   </head>
   
   <body>
   
       <?php if(Auth::check()): ?>
   
<?php else: ?>
     
<?php endif; ?>
        
         
     
	</div>
</body>
</html>

<?php echo $__env->make('test', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>