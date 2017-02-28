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
		echo "<br>";
		echo "This course was enrolled by this user";	  
	 
		
	   }
	       $data = $scourses->title . "<br>";
		   $data .= $scourses->summary . "<br>";
		 
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
		echo "PRICE: " . $price;
		 echo "<br>";
	     echo "<a href='http://localhost/laravel-lecture/public/singlecourses/" . $course_id . " ' " . ">LINK</a>";
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
	    echo "Enrollment ID: ---- " . $cid2;
	   echo "<br>";
	   echo "USER ID: ENROLLED " . $cid3;
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
		echo "This course was enrolled by this user";	  
	 
		
	   }
	   
	   
	   echo "<br>";
	
	   }
	   
		if($userenrolledid === $useraccessid){
		echo "SUMMARY: " . $summary; 
        echo "<br>";		
		 echo "Course id: ". $course_id;
		 
		  
	 
		   
		 echo "<br>";
		}else
		{
		echo " NOT ENROLLED";
		echo "<li><a href=";
		echo   URL::to('/enrollments');
		echo "?=" . $course_id;
		echo ">ENROLL NOW</a></li>";
		 $courseidcheck = self::getcourserid();
	  
		}
		 echo "<li><a href=";
		echo   URL::to('/enrollments');
		echo "?=" . $course_id;
		echo ">ENROLL NOW</a></li>"; 
		echo "<br>";
		 
		 echo "<br>";
		echo "URL: " . $course_url_name;
		echo $checkimage;
		if ($checkimage == "jpg" || $checkimage == "gif" || $checkimage == "png") {
		echo "<img src=";
		echo ' " ';
		echo $files2;
		echo ' " ';
		echo "width='300' ";
        echo  "/>";
		echo  $files2; }else {}
		if ($checkimage == "txt" || $checkimage == "zip" || $checkimage == "pdf") {
		echo "<a href=" . $files2  . ">" . "DOWNLOAD" . "</a>";
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
  
}

?>