<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Post;

class PostController extends Controller
{
    public function showPosts($section, $theme)
    {
        $posts = Theme::where('name', '=', $theme)
                ->first()
                ->posts()
                ->orderBy('updated_at')
                ->paginate(3);
        
        return view ('main.posts', ['posts'=>$posts, 'theme'=>$theme]);
    }
    
    public function showPostsGuest($section, $theme)
    {
        $posts = Theme::where('name', '=', $theme)
                ->first()
                ->posts()
                ->orderBy('updated_at')
                ->paginate(3);
        
        return view ('guest.posts', ['posts'=>$posts, 'theme'=>$theme]);
    }
}
