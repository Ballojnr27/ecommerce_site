<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function edit(){
        $user = Auth::user();

        return view('edit_profile', compact('user'));
    }

    public function edit_profile(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255'],
            'security_ques' => ['required','string', 'max:255'],
        ]);



        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->security_ques = $request->input('security_ques');
        if($request->filled('current_password')) {
            $request->validate([
                'current_password' => ['current_password'],
                'password' => [ 'nullable', 'string', 'min:8', 'confirmed']
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();



        return redirect()->route('home')->with('success', 'Profile updated successfully');;

    }


}
