<?php 

namespace App\Http\Controllers;
use App\Lecture;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Input;
class LectureController extends Controller {

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
  $order = Input::get('order');
	$title = Input::get('title');
	$description = Input::get('description');
	$URL = Input::get('URL');
	$created_at = Input::get('created_at');
	$updated_at = Input::get('updated_at');
	$course_id = Input::get('course_id');
	$deleted_at = Input::get('deleted_at');	 
	$sample = Input::get('sample');
    $courseall = DB::table('lectures')->insert(
    array('order' => $order, 'title' => $title, 'URL' => $URL, 'description' => $description, 'created_at' => $created_at, 'updated_at' => $updated_at, 'course_id' => $course_id, 'deleted_at' => $deleted_at,  'sample' => $sample));
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