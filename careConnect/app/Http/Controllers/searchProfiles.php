<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class searchProfiles extends Controller
{
    
    public function index()
    {
        // $users = User::all();
        $users = User::where('id', '!=', auth()->id())->simplePaginate(5);

        // $users = User::whereIn('name',$user);
        // $users = User::whereIn('users.id',$user)->get();
        // dd($users);
        return view('searchProfiles.index',compact('users'));
    }
    // ->get()->paginate(5)
}
