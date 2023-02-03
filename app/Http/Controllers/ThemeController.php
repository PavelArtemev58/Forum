<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Section;

class ThemeController extends Controller
{
    public function showThemes($section)
    {
        $themes = Section::where('name', '=', $section)
                ->first()
                ->themes()
                ->paginate(2);
        
        return view ('main.themes', ['themes'=>$themes, 'section'=>$section]);
    }
}
