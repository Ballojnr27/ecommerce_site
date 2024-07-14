<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ForgetPassController extends Controller
{
    public function showResetForm(){
            
        return view('auth/for_pass');
   }

 
//  private $user;

  public function resetPassword(Request $request)
  {
      $request->validate([
          'email' => 'required|email|exists:users,email',
          'security_ques' => 'required',
          'password' => 'required|confirmed|min:8',
        ]);

      $user = User::where('email', $request->input('email'))->first();

      //var_dump($this->user);
      

      if ($user->security_ques === $request->security_ques ) {
          
        $user->password = Hash::make($request->input('password'));
        $user->save();
          // Send notification to the user

          return redirect()->route('login')->with('password_changed', true);
      }

      return back()->withInput()->withErrors(['security_ques' => 'Your answer is incorrect.']);
 
    }
   
  }

