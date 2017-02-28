<?php 

namespace App\Http\Controllers;
use DB;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class PaymentController extends Controller {

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
    $created_at = Input::get('created_at');
	$updated_at = Input::get('updated_at');
	$user_id = Input::get('user_id');
	$deleted_at = Input::get('deleted_at');
	$enrollment_id = Input::get('enrollment_id');
	 
    $courseall = DB::table('payments')->insert(
    array('created_at' => $created_at, 'updated_at' => $updated_at, 'user_id' => $user_id, 'deleted_at' => $deleted_at, 'enrollment_id' => $enrollment_id));
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