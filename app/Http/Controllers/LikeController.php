<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    // public function index(){

    //     return ;
    // }

    public function store(Request $request)
    {
        $check_liked=Like::where([
            ['user_id', '=', Auth::user()->id],
            ['post_id', '=', $request->id],
        ])->get();
        if($check_liked->isEmpty()){
            $like= new Like;
            $like->user_id=Auth::user()->id;
            $like->post_id=$request->id;
            $like->save();
            $post= Post::find($request->id);
        $post->total_likes=$post->total_likes+1;
        $post->save();

            
        }
        else{
            Like::where([
                ['user_id', '=', Auth::user()->id],
                ['post_id', '=', $request->id],
            ])->delete();
            
        $post= Post::find($request->id);
if($post->total_likes>0){
    $post->total_likes-=1;
    $post->save();
}
        }

        return back();
    }

}
