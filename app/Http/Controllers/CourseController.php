<?php 

namespace App\Http\Controllers;
use DB;
use App\Course;
use App\Enrollment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use URL;
use Auth;
Use Form;
use Illuminate\Routing\UrlGenerator;
class CourseController extends Controller {

  /**
   * RETURN USER ID.
   *
   *  
   */
   public function useraccess(){
   //$useraccess = new UserController;
   //$useraccessid = $useraccess->show();
   //return $useraccessid;

   }
   /**
   * Check if user was enrolled.
   *
   *  
   */
   public function courseenrolled(){
    //$ifenrolled = new EnrollmentController;
   //$enrolled = $ifenrolled->ifenrolled();
   //$useraccessright = self::useraccess();
   //if($enrolled = $useraccessright){
   //return "enrolled";
 
   //}else {return false;}
  }
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function getcourserid(){
    
	   }
	public function singlecourse($id){
	 
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
	       $data = "<h1>" . $scourses->title . "</h1>" . "<br>";
		   $data .= $scourses->summary . "<br>";
		   $data .= "<br>";
		   $data .= "<img src=' ";
		   $data .= $scourses->files . " ' ";
		   $data .= "width='500' /> <br>";
		   $data .= "<br>";
		    
	   }
	    if (Auth::check()) {
       return View::make('singlecourses')->with('singlepost', $data);
	   }else{return View::make('singlecoursesguest');}
	   }
  public function index(Request $request)
  {
  /**
   *  
   *
   *  
   */
  
		
	   $view1 = View::make('courseslist'); 
	   $courseall = DB::table('courses')->get();
	   echo $view1;
	   foreach($courseall as $courses)
	   {
	   $title = $courses->title;
	   $summary = $courses->summary; 
	   $price = $courses->price; 
	   $files2 = $courses->files; 
	   $course_id = $courses->id;
	   $checkimage = substr($files2, -3);
	   $course_url_name = $courses->course_url_name;
        echo "<div style='width: 80%; margin: auto; margin-bottom: 20px;' class='couseslist'>";	
		echo "<hr>";
		echo "<h1>";		
	    echo $title;
		echo "</h1>";
	    echo "<br>";
		echo "PRICE: $" . $price;
		echo "<br>";
	    
		$enrolled = new EnrollmentController;
		$userenrolledid = $enrolled->ifenrolled();   
		$d = new UserController;
		$useraccessid = $d->show();  
		$checkenrollment = self::courseenrolled();
		
		$cid =  DB::table('enrollments')->where('course_id', $course_id)->get();
		foreach($cid as $cid1)
	   {
	   $cid2 = $cid1->id;
       $cid3 = $cid1->user_id;
	   $cid4 = $cid1->course_id;
	    //echo "Enrollment ID: ---- " . $cid2;
		echo "<br>";
	   //echo "USER ID: ENROLLED " . $cid3;
		echo "<br>";	  
		global $userid1; 	    
        $useridforcourse1 =  DB::table('courses')
            ->join('enrollments', 'courses.id', '=', 'enrollments.course_id')
			->limit(1)
            ->get();
		foreach($useridforcourse1 as $useridenrolled)
	   {
	   $userid1 = $useridenrolled->course_id;
		echo "<br>";
		echo "<span style='background: green; padding: 5px; color: white; margin: 7px;'> Enrolled </span>";	  
		 echo "<a href='http://localhost/laravel-lecture/public/singlecourses/" . $course_id . " ' " . "><span style='background: blue; padding: 15px; border-radius: 4px; color: white; margin: 7px;'> DETAILS </span></a>";
		echo "<br>";		
	   }	   	   
	   echo "<br>";	
	   }	   
		if($userenrolledid === $useraccessid){
		echo "SUMMARY: " .  $summary; 
        echo "<br>";		
		echo "Course id: ". $course_id;		   
		echo "<br>";
		echo "<br>";
		}else
		{
		echo " NOT ENROLLED";
		echo "<span><a href=";
		echo  URL::to('/enrollments');
		echo "?=" . $course_id;
		echo " target='_blank'><br>ENROLL NOW</a></span>";
		 $courseidcheck = self::getcourserid();
	  
		}
		echo "<span style='float: right; background: yellow; padding: 7px; margin-top: 20px; font-size: 20px;'><a href=";
		echo   URL::to('/enrollments');
		echo "?=" . $course_id;
		echo " target='_blank'> ENROLL NOW</a></span>"; 
		echo "<br>";		 
	 
		echo "<br>";
		echo "<br>";
		echo "File Type: " . $checkimage;
		 echo "<br>";
		if ($checkimage == "jpg" || $checkimage == "gif" || $checkimage == "png") {
		echo "<a href=' ";
		echo  $files2;
		echo  " ' target='_blank'>";
		echo "<img src=";
		echo ' " ';
		echo $files2;
		echo ' " ';
		echo "width='100' ";
        echo  "/> </a>";
		echo "<br>";
		echo "<br>";
	     
	    echo "<br>";
		echo "<div style='height: 3px; width: 100%; background: #000; margin-top: 20px;'></div>";
		  }else {}
		if ($checkimage == "txt" || $checkimage == "zip" || $checkimage == "pdf") {
		echo "<a href=" . $files2  . ">" . "  <span style='background: orange; padding: 5px;'> VIEW FILES </span>" . "</a>";
		}else {}
		echo "</div>";
	   }	         
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Request $request)
  {
     
   
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $title = Input::get('title');
	$summary = Input::get('summary');
	$description = Input::get('description');
	$target = Input::get('target');
	$lecture_count = Input::get('lecture_count');
	$running_time = Input::get('running_time');
	$price = Input::get('price');
	$free = Input::get('free');	 
	$feature = Input::get('feature');
	$objective = Input::get('objective');
	$course_url_name = Input::get('course_url_name');
	$files = $request->file('files');	 
	$available = 1;
	$destinationPath = storage_path('uploads');	 
    $files->move($destinationPath,$files->getClientOriginalName());
	$filename = $files->getClientOriginalName();
	$baseurl = "http://localhost/laravel-lecture";
	$filepath = $baseurl . "/storage/uploads/" . $filename; 
    $courseall = DB::table('courses')->insert(
    array('title' => $title, 'id' => 0, 'free' => 0, 'summary' => $summary, 'description' => $description, 'target' => $target, 'lecture_count' => 0, 'running_time' => $running_time, 'price' => $price,  'feature' => $feature, 'objective' => $objective, 'course_url_name' => $course_url_name, 'available' => $available, 'files' => $filepath));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  $id = "1";
    $view1 = View::make('courseslist'); 
	   $courseall = DB::table('courses')->get();
	    echo $view1;
	   foreach($courseall as $courses)
	   {
	   $title = $courses->title;
	   $summary = $courses->summary; 
	   $price = $courses->price; 
	    $course_url_name = $courses->course_url_name;
        echo "<div style='width: 80%; margin: auto;' class='couseslist'>";	   
	    echo $title;
	    echo "<br>";
		 echo "PRICE: " . $price;
	    echo "<br>";
		echo "SUMMARY: " . $summary;
		echo "URL: " . $course_url_name;
		echo "</div>";
	   }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $singlecourse_up = DB::table('courses')->where('id', $id)->get();	 
	   foreach($singlecourse_up as $scourses_up)
	   {
	$useridforcourse_up =  DB::table('enrollments')
            ->join('users', 'users.id', '=', 'enrollments.user_id')
			->limit(1)
            ->get();
		foreach($useridforcourse_up as $useridenrolled_up)
	   {
	   $userid_up = $useridenrolled_up->course_id;		 		
	   }
	      
		         
		   $data_up = $scourses_up;
		   
	   }
	     //if (Auth::check()) {
       return View::make('singlecourseupdate')->with('singlepost1', $data_up);
	   //}else{return View::make('singlecourseupdateguest');}
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  /**
   * Editing dashboard
   *
   *  
   *  
   */
    public function updatedataview($id, Request $request )
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
	       $id1 = self::updategetcoursetinfo($id, $summ, $stitle, $sprice, $sfiles);
	       //$data = "<h1>" . $scourses->title . "</h1>" . "<br>";
		   //$data .= $scourses->summary . "<br>";		 
		   //$data .= "<br>";
		   //$data .= "<img src=" . $scourses->files . " width='500' />" . "<br>";
		   //$data .= "<br>";		 
		   $data = "<form action=";
		   $data .= " 'http://localhost/laravel-lecture/public/singleupdate/" . $scourses->id;
		   $data .=  " ' ";
		   $data .= "method='get' >";
		   $data .=  "TITLE: " . $stitle;		   
		   $data .= "<br>";			   
		   $data .= "<input  placeholder='TITLE' style='width: 100%; margin-bottom: 20px;' name='title' type='text'  />";
		   $data .= "<br>";
		   $data .= "<textarea name='summary' rows='4' cols='20'> "; //input start
		   $data .= "  ";
		   $data .= $summ;
		   $data .= " </textarea>"; //input end
		   $data .= "<br>";
		   $data .= "<input placeholder='PRICE' name='price' type='text' "; //input start
		   $data .= " value=' ";
		   $data .= $sprice;
		   $data .= " ' />"; //input end
		   $data .= " <input placeholder='URL' name='files' type='text' />"; //input start
		   $data .= $sfiles;
		   //$data .= " value=' ";
		   //$data .= $sfiles;
		   //$data .= " ' />"; //input end
		   $data .= "<br>";
		   $data .= "<input name='updatedata' type='submit' value='UPDATE' />";
		   $data .= "</form>";
		    	 
		}
	  
  return View::make('singlecourseupdateview')->with('singlepost2', $data);
  
  }
		/**
		* OK   
		*/
 public function updategetcoursetinfo($id, &$summ, &$stitle, &$sprice, &$sfiles)
 {
		$summ = "";
		$singlecourse = DB::table('courses')->where('id', $id)->get();	 
		foreach($singlecourse as $scourses)
		{ $scoursesid = $scourses->id;	
		$stitle = $scourses->title;	   
		$summ = $scourses->summary;
        $sprice = $scourses->price;	
		$sfiles	= $scourses->files;	
		}
		}
		/**
		* OK   
		*/
    public function updatedata($id, Request $request)
  {
		$stitle1 = Input::get('title');	
		if(empty($stitle1)){
		$stitle1 = "NO TITLE";
        }else{
		$stitle1 = Input::get('title');		
		} 	
	    $summ1 = Input::get('summary');
		$sprice1 = Input::get('price');
		$sfiles1 = Input::get('files');
		//$tfiles = $request->file('files');
		 //$thefile = $tfiles->getClientOriginalName();
		$destinationPath = storage_path('uploads');	 		 
		$baseurl = "http://localhost/laravel-lecture"; 
        //$tfiles->move($destinationPath,$tfiles->getClientOriginalName());		
        //$tfiles->move($destinationPath, "image.jpg");
		//$filepath1 = $baseurl . "/storage/uploads/" . "image.jpg";
		$id1 = self::updategetcoursetinfo($id, $summ, $stitle, $sprice, $sfiles);
		$updatedatadb = DB::table('courses')->where('id', $id)->update(
		array('title' => $stitle1, 'id' => $id, 'summary' => $summ1, 'price' => $sprice1, 'files' => $sfiles1));
		$theurl = "/edit/" . $id;
		return redirect($theurl);//after called editdata route
	 	echo "UPDATED";
  }
}

?>