<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Bookmark;
use App\Models\Like;

class PostController extends Controller
{

    public function index() 
    {
        $posts = Post::latest();

        
        if(request('search')){
            $posts->where('body','like', '%' . request('search') . '%');
        }
        
        

        return view('posts',[
            'posts' => $posts->get(),
            'user' => User::find(auth()->user()->id),
            'bookmark' => Bookmark::where('user_id',auth()->user()->id)->get(),
            'like' => Like::class
        ]);
    }
}