<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile(){
      return view('profile', array('user' => Auth::user()) );
    }

    public function update_imgprofile(Request $request){
      // Handle user upload profile image
      if($request->hasFile('profile_img')){
        $profile_img = $request->file('profile_img');
        $filename = time() . '.' . $profile_img->getClientOriginalExtension();
        Image::make($profile_img)->resize(300, 300)->save(public_path('/images/profile_images/' . $filename));

        $user = Auth::user();
        $user->profile_img = $filename;
        $user->save();
      }
      return view('profile', array('user' => Auth::user()) );
    }
}
