<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index($user)
    {

        $follows = (auth()->user())  ? auth()->user()->following->contains($user) : false;

        $postCount = Cache::remember(
            'count.posts.' . auth()->user()->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                 return auth()->user()->posts->count();
            });

        $followerCount = Cache::remember(
            'count.followers.' . auth()->user()->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                    return auth()->user()->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . auth()->user()->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                    return auth()->user()->following->count();
            });

       
        $user = User::findOrFail($user);
        return view('profiles.index', compact('user', 'follows','postCount','followerCount','followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')){
            $imagepath = request('image')->store('profile', 'public');
    
            $image = Image::make(public_path("/storage/{$imagepath}"))->fit(1200,1200);
            $image->save();

            $imageArray = ['image' => $imagepath];
        }

        auth()->user()->profile->update(array_merge(
            $data,$imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
