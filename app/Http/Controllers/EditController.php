<?php 

namespace App\Http\Controllers;
use DB;
use App\Course;
use App\User;
use App\Enrollment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use URL;
use Auth;
Use Form;

use Illuminate\Routing\UrlGenerator;

class EditController extends Controller {

  
  public function index($id, Request $request)
  {    
	$singlecourse = DB::table('courses')->where('id', $id)->get();	 
	   foreach($singlecourse as $scourses)
	   {
	    
	   $useridforcourse1 =  DB::table('enrollments')
            ->join('users', 'users.id', '=', 'enrollments.user_id')
			->limit(1)
            ->get();
		foreach($useridforcourse1 as $useridenrolled)
	   {
	   $userid1 = $useridenrolled->course_id;		 		
	   }
	        $enrolled = new CourseController;
	       $id1 = $enrolled->updategetcoursetinfo($id, $summ, $stitle, $sprice, $sfiles);
		    
	       //$data = "<h1>" . $scourses->title . "</h1>" . "<br>";
		   //$data .= $scourses->summary . "<br>";		 
		   //$data .= "<br>";
		   //$data .= "<img src=" . $scourses->files . " width='500' />" . "<br>";
		   //$data .= "<br>";	
			$data = "<a href='http://localhost/laravel-lecture/public/singlecourses/" . $id . " ' target=_'blank'> PREVIEW</a>";			   
		   $data .= "<form action=";
		   $data .= " 'http://localhost/laravel-lecture/public/editdata/" . $scourses->id;
		   $data .=  " ' ";
		   $data .= "method='post' >";
		   $data .=  "TITLE: " . $stitle;		   
		   $data .= "<br>";			
 		   
		   $data .= "<input  placeholder='TITLE' style='width: 100%; margin-bottom: 20px;' name='title' type='text'  />";
		   $data .= "<br>";
		    $data .= "COURSE ID:" . $scourses->id;
		   $data .= "<textarea name='summary' rows='4' cols='20'> "; //input start
		   $data .= "  ";
		   $data .= $summ;
		   $data .= " </textarea>"; //input end
		   $data .= "<br>";
		   $data .= "<input placeholder='PRICE' name='price' type='text' "; //input start
		   $data .= " value=' ";
		   $data .= $sprice;
		   $data .= " ' />"; //input end
		   $data .= " <input placeholder='URL' name='files' type='text' "; //input start
		   //$data .= $sfiles;
		   $data .= " value=' ";
		   $data .= $sfiles;
		   $data .= " ' />"; //input end
		   $data .= "<br>";
		   $data .= "<input name='updatedata' type='submit' value='UPDATE' />";
		   $data .= "</form>";
		    	 
		}
	  
  return View::make('editdata')->with('editdata', $data);	 
 
}
   
  
}

?>