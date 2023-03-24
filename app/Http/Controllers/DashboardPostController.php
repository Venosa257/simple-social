<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'image' => 'image|file|max:3072',
            'body' => 'required'
        ]);
       

        if ($validator->fails()) {
            return redirect('/dashboard/posts/create')->withErrors($validator)->withInput();
        }
        
        $validatedData = $validator->getData();

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        unset($validatedData['_token']);
        $validatedData['body'] = strip_tags($request->body);
        Post::create($validatedData);


        return redirect('/dashboard/posts')->with('success', 'New post has been added!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:3072',
            'body' => 'required'
        ];
       
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/dashboard/posts/create')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->getData();
        
        if($request->file('image')) {
            if($request->oldImage) {
                
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['body'] = strip_tags($request->body);
        
        unset($validatedData['_token']);
        unset($validatedData['_method']);
        unset($validatedData['oldImage']);
        
        Post::where('id',$post->id)
        ->update($validatedData);

        
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image) {
                
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }
}