<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.admindashboard',['users'=> $users]);
    }

    public function update($id){
        $user = User::where('id',$id)->first();

        if($user->user_type=='user'){
            $user->user_type='admin';
        }
        else{
            $user->user_type='user';
        }
            
        $user->save();
        return redirect()->route('admin.dashboard')
        ->with('success', 'user updated successfully.');
    }

    public function destroy($id){
        $user=User::where('id',$id)->first();

        // $user->delete();
        return back();
    }
   
}
