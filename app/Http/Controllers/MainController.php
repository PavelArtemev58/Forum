<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class MainController extends Controller
{
    public function showHome()
    {
        $sections = Section::get('name');
        
        return view('main.home', ['sections'=>$sections]);
    }
    
    public function showHomeGuest()
    {
        $sections = Section::get('name');
        
        return view('guest.home', ['sections'=>$sections]);
    }
}
