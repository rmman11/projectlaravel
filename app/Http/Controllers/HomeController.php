<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator, Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\User;


class HomeController extends Controller
{
    //




        public function __construct()
    {
        $this->middleware('auth');
    }



         public function home()
    {  
    


        return view('home');
    }

    public function dashboard(){


        

$user = Auth::user();
           $sessions = DB::table('sessions')
            ->whereNotNull('user_id')
            ->orderByDesc('last_activity')
            ->get();
    return view('dashboard',compact('sessions'));

    }
}


