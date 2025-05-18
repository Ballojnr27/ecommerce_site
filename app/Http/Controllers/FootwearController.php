<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footwears;


class FootwearController extends Controller
{
    public function maleshoes()
    {
        $footwears = Footwears::where('category', 'Male Shoe')->whereNull('deleted_at')->get();
        return view('maleshoes', compact('footwears'));
    }

    public function femaleshoes()
    {
        $footwears = Footwears::where('category', 'Female Shoe')->whereNull('deleted_at')->get();
        return view('femaleshoes', compact('footwears'));
    }

    public function slides()
    {
        $footwears = Footwears::where('category', 'Casual Wear')->whereNull('deleted_at')->get();
        return view('slides', compact('footwears'));
    }

    public function sandals()
    {
        $footwears = Footwears::where('category', 'Sandal')->whereNull('deleted_at')->get();
        return view('sandals', compact('footwears'));
    }
}

