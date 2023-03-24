<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Http\Request;


class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.bookmark.index',[
            'bookmark' => Bookmark::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $post_id = $request->id;

        $checkIfExists = Bookmark::where([['user_id','=',$user_id],['post_id','=',$post_id]])->exists();
        
        if(!$checkIfExists){
            echo "<script>
            alert('Added to bookmark!');
            window.location.href = '/';
            </script>";
            
            Bookmark::create([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);

        } else {
            echo "<script>
            alert('Already bookmarked!');
            window.location.href = '/';
            </script>";
            
        }
      
        
        return '';
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookmark $bookmark)
    {
        return view('dashboard.bookmark.show',[
            'bookmark' => $bookmark
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        Bookmark::destroy($bookmark->id);
        return redirect('/dashboard/bookmark')->with('success', 'Removed from bookmark!');
    }
}