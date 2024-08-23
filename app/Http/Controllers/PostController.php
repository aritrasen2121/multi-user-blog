<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('dashboard',['posts'=>$posts]);
    }

    public function create()
    {
        return view('components.post-form');
    }

    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
        $user_name=Auth::user()->name;
        $post= new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->image_url=$request->image_url;
        $post->user_name=$user_name;
        $post->user_id=$user_id;
        $post->save();

        return redirect('dashboard')->with('status','post added');
    }

    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
