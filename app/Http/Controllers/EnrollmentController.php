<?php 

namespace App\Http\Controllers;
use DB;
use App\Enrollment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
class EnrollmentController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $useraccess = new UserController;
   $useraccessid = $useraccess->show(); 
   $url = $_SERVER['HTTP_REFERER'];
   $getcourseid = substr($url, strrpos($url, '=') + 1);
   $year = Input::get('year');
   $month = Input::get('month');
   $day = Input::get('day');
   $creation = Carbon::createFromDate($year, $month, $day);
   $updatedate = Carbon::createFromDate($year, $month, $day);
    $status = Input::get('status');
	$created_at = $creation;
	$updated_at = $updatedate; 
	$course_id = Input::get('course_id');
	$user_id = $useraccessid;
	$payment_id = Input::get('payment_id');
	$start_date = Input::get('start_date');
	$end_date = Input::get('end_date');
    $courseall = DB::table('enrollments')->insert(
    array('status' => $status, 'course_id' => $getcourseid, 'user_id' => $user_id, 'payment_id' => $payment_id, 'end_date' => $end_date, 'start_date' => $start_date, 'created_at' => $created_at, 'updated_at' => $updated_at));
  
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
   public function ifenrolled(){
   $useraccess = new UserController;
   $useraccessid = $useraccess->show(); //return user's id
   //if enrollments has "user_id" the same as users "id"
   $ids = DB::table('enrollments')->where('user_id', $useraccessid)->get();	
    foreach($ids as $myid){   
	return $myid->user_id;
	 }
   }
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