<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse



    {

 $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $photoPath = null;


       $manager = new ImageManager(new Driver()); 
$user = new User();
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);



  if ($request->hasFile('photo')) {
    //$file = Input::file('image');
    $file = $request->file('photo');
    //getting timestamp
    $timestamp = str_replace([' ', ':'], '-', Carbon::now() -> toDateTimeString());
  
    $name = $timestamp . '-' . $file -> getClientOriginalName();
    $data['photo'] = 'images/avatars' . $request->file('photo')->getClientOriginalName();
    $user->photo = $name;
  
    $file->move(public_path() . '/images/avatars/', $name);
    //dd($name);
  
  }
  
  $user->save();

    

        event(new Registered($user));

        Auth::login($user);

        return redirect('login');
    }
}
