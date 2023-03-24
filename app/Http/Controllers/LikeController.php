<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function change(Request $request)
    {
        $user_id = auth()->user()->id;
        $post_id = $request->id;
        $likes =  Like::where([['user_id','=',$user_id],['post_id','=',$post_id]]);
       
        if(!$likes->exists()){
            echo "<script>
            alert('Liked!');
            window.location.href = '/';
            </script>";
            
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);

            Post::where('id',$post_id)->increment('likes');

        } else {
            echo "<script>
                alert('Unlike!');
                window.location.href = '/';
                </script>";
                
                Post::where('id',$post_id)->decrement('likes');
                $likes->delete();
        }
        return '';
    }
}