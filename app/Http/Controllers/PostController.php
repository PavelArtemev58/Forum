<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
    public function storePost(Request $request, $theme)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);
        
        $theme_id = Theme::whereName($theme)->first();
        $theme_id = $theme_id->id;
        
        $post = new Post;
        $post->text = $validated['text'];
        $post->theme_id = $theme_id;
        $post->user_id = Auth::user()->id;
        $post->save();
        
        return redirect()->back();
    }
    
    public function changePost(Request $request, $id)
    {
        if(isset($request->change)){
            $validated = $request->validate([
                'text' => 'required',
            ]);
            
            $post = Post::find($id);
            $post->text = $validated['text'];
            $post->save();
            
            $themeName = $post->theme->name;
            $sectionName = Theme::whereName($themeName)->first()->section->name;
            
            return redirect()->route('posts',['section'=>$sectionName, 'theme'=>$themeName]);
        }
        
        $post = Post::find($id);
        
        return view('main.changepost', ['post'=>$post]);
    }
    
    public function deletePost($id)
    {
        Post::destroy($id);
        
        return redirect()->back();
    }
}
