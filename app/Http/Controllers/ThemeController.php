<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;
use App\Models\Section;
use App\Models\Post;

class ThemeController extends Controller
{
    public function showThemes($section)
    {
        $themes = Section::where('name', '=', $section)
                ->first()
                ->themes()
                ->paginate(3);
        return view ('main.themes', ['themes'=>$themes, 'section'=>$section]);
    }
    
    public function showThemesGuest($section)
    {
        $themes = Section::where('name', '=', $section)
                ->first()
                ->themes()
                ->paginate(3);
        
        return view ('guest.themes', ['themes'=>$themes, 'section'=>$section]);
    }
    
    public function storeTheme(Request $request, $section)
    {
        $validated = $request->validate([
           'name' => ['required', 'unique:themes','min:5', 'max:255'] 
        ]);
        
        $section_id = Section::whereName($section)->first('id');
        $section_id = $section_id->id;
        
        $theme = new Theme;
        $theme->name = $validated['name'];
        $theme->section_id = $section_id;
        $theme->user_id = Auth::user()->id;
        $theme->save();
        
        return redirect()->back();
    }
    
    public function changeTheme(Request $request, $id)
    {
        if(isset($request->change)){
            $validated = $request->validate([
                'name' => ['required', 'min:5', 'max:255'],
            ]);
            
            $theme = Theme::find($id);
            $theme->name = $validated['name'];
            $theme->save();
            
            return redirect()->route('themes', ['section'=>$theme->section->name]);
        }
        
        $theme = Theme::find($id);
        
        return view ('main.changetheme', ['theme'=>$theme]);
    }
    
    public function deleteTheme($id)
    {
        Post::where('theme_id', '=', $id)->delete();
        
        Theme::destroy($id);
        
        return redirect()->back();
    }
}
