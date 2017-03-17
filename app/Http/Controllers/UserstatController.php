<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ajax;
 use Course;
use Illuminate\Support\Facades\DB;
use Userstat;
use User;
class UserstatController extends Controller {
 
   public function userstat(){
   $id = self::getuserid();  
   $userstat = DB::table('userstatview')->where('id', $id)->get();	 
	   foreach($userstat as $userstatview)
	   {	   
			return $userstatview->videoplaytime;
			}	    
   }
   public function userstat2(){
   $id = self::getuserid();  
   $userstat = DB::table('userstatview')->where('id', $id)->get();	 
	   foreach($userstat as $userstatview)
	   {	   
			return $userstatview->lessontime;
			}	    
   }
   public function getuserid(){
   return 1;
   }
}