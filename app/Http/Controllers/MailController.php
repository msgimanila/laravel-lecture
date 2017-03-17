<?php 

namespace App\Http\Controllers;
use DB;
use Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use URL;
use Auth;
Use Form;
use Illuminate\Routing\UrlGenerator;

class MailController extends Controller {

  
  public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to(' ')->subject('Your Reminder!');
        });
    }
   
  
}

?>