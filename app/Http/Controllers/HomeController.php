<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Auth;
use Response;
use Session;
use App\User;
use App\Course;
use App\Unit;
use App\CourseUser;
use Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
	    return view('chat');
    }
}
