<?php

namespace App\Http\Controllers;
use View; 
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use DB;
use URL;
use Auth;
use Illuminate\Support\Facades\Input;
use User;
use App\Coursemodule;
use Form;
class CourseModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
	
		$getuserid = $id;
        $updatecmview = DB::table('coursemodules')->where('course_id', $getuserid)->get();
		foreach ($updatecmview as $cmview){
		global $cmviewdata1;
		$cmid = $cmview->id;
		$cmviewdata = $cmview->title;
		$cmviewdata .= "<br>";
		$cmviewdata .= "Module ID:" . $cmid;
		$cmviewdata .= "<br>";
		$cmviewdata .= $cmview->summary;
		$cmviewdata .= "<a href='http://localhost/laravel-lecture/public/coursemoduleupdate/"; 
		$cmviewdata .= $id . '/' . $cmid;
        $cmviewdata .= " '>BACK TO EDIT</a>";
		return View::make('coursemodules')->with('coursemodule', $cmviewdata);
		}
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store($id)
    {

		
		$updatethis = false;
        
        $ctrue = Input::get('checktrue');		 
		if($ctrue == 1){
		$t = "UPDATED";
		$cmtitle_1 = Input::get('title');
		$cmsumm_1 = Input::get('summary');
		$updatecmdata = DB::table('coursemodules')->insert(
		array('title' => $cmtitle_1, 'summary' => $cmsumm_1, 'course_id' => $id)); 
		return View::make('coursemoduleupdate')->with('updatecoursemodule', $t);
		}else{ 		
		$updatethis = false; 
		$s  = Form::open(['url' => '/coursemoduleinsert/' . $id, 'method'=>'get']);
		$s .= Form::text('title');
		$s .= "<br>";
		$s .= "<br>";
		$s .= Form::checkbox('checktrue');
		$s .= "Check to Update";
		$s .= "<br>";
		$s .= "<br>";
		$s .= Form::textarea('summary');
		$s .= "<br>";
		$s .= "<br>";
		$s .= Form::submit('Module Update');
		$s .= "<br>";
		$s .= "<br>";
		$s .= Form::close();
		return View::make('coursemoduleupdate')->with('updatecoursemodule', $s);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $cid)//update modules per ID
    {
        
		 
		$cmid = $id;
        $updatecmview = DB::table('coursemodules')
            ->where('coursemodules.id', '=', $cid)
			->where('coursemodules.course_id', '=', $cmid)
            ->get();
		foreach ($updatecmview as $cmview){
		
		global $cm_title;
		global $cm_summ;
		$cm_title = $cmview->title;
		$cm_summ = $cmview->summary;	 
		//$cmview_1 = $cmview->id;
		//$cmview_1 .= $cmview->title;
		//$cmview_1 .= $cmview->summary;
		$cmview_1 = Form::open(['url' => '/coursemoduleupdatenow/' . $id . '/' . $cid, 'method'=>'get']);
		$cmview_1 .= Form::text('title', $cm_title);
		$cmview_1 .= Form::textarea('summary', $cm_summ);
		$cmview_1 .= "<script src='http://localhost/laravel-lecture/public/js/test.js' > </script>";
		$cmview_1 .= Form::submit('UPDATE');
		$cmview_1 .= "<br>";
		$cmview_1 .= "<br>";
	    $cmview_1 .= "<a href='";
		$cmview_1 .= URL::to('/coursemoduleview/');
		$cmview_1 .= '/' . $id . '/' . $cid;
		$cmview_1 .= "'>PREVIEW</a>";
		$cmview_1 .= "<br>";
		$cmview_1 .= "<br>";
		$cmview_1 .= "<a href='";
		$cmview_1 .= URL::to('/singlecourses/');
		$cmview_1 .= '/' . $id;
		$cmview_1 .= "'>BACK TO MAIN COURSE</a>";
		}
		 
		 return View::make('coursemoduleupdate')->with('updatecoursemodule', $cmview_1);
    }

    /**
     *  
     *
     *  
     *  
     */
    public function updatenow(Request $request, $id, $cid) //this is updating a single Course Module
    {
	    
	   $cmt =Input::get('title');
	   $cms =Input::get('summary');
       $updatecmthis = DB::table('coursemodules')->update(
	   array('title' => $cmt, 'summary' => $cms));
	   //return View::make('coursemoduleupdate')->with('updatecoursemodule', "UPDATED");//TO DO this should  	   
	   return back()->withInput();
    }
	 
}
