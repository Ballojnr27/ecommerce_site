<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FootwearController extends Controller
{
    public function maleshoes(){
            
        return view('maleshoes');
   }

   public function femaleshoes(){
            
    return view('femaleshoes');
}

public function slides(){
            
    return view('slides');
}

public function sandals(){
            
    return view('sandals');
}
   
}
