<?php


namespace App\Http\Controllers;

use App\Models;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->simplePaginate(5);

        return view('posts.index', compact('posts'));
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required','image']
        ]);
        array_push($data,"user_id");
        $data["user_id"] = auth()->id();

        $imagepath = request('image')->store('uploads', 'public');
        $data["image"] = $imagepath;

        $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200);
        $image->save();

        \App\Models\Post::create($data);

        return redirect('/profile/' . auth()->id());
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
