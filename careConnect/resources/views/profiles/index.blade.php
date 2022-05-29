@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row'>
        <div class="col-3 p-5">
            <img src="{{  $user->profile->profileImage()  }}" class="rounded-circle w-100">
        </div>
        <div class="col-8 pt-5 align-items-baseline">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                
                
                @can('update', $user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan   

            </div>
            <div><follow-button user-id="{{  $user->id  }}" follows="{{  $follows  }}"></follow-button></div>
            
            <div class="d-flex">
                <div class="pe-3"><strong>{{  $postCount  }}</strong> posts</div>
                <div class="pe-3"><strong>{{  $followerCount  }}</strong> followers</div>
                <div class="pe-3"><strong>{{  $followingCount  }}</strong> following</div>
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{  $user->id  }}/edit">Edit Profile</a>
            @endcan
            <div class="pt-4"><strong>{{  $user->profile->title  }}</strong></div>
            <div class="pt-1">{{  $user->profile->description  }} </div>
            <div><a href="#">{{  $user->profile->url ?? 'No Link'  }} </a></div>

 

        </div>
    </div>

    <div class="row pt-3">
        
        
        @foreach($user->posts as $post)

        <div class="col-4 p-5">
            <a href="/p/{{  $post->id  }}">
                <img src="/storage/{{  $post->image  }}" class="w-100">
            </a>
        </div>

        @endforeach
    </div>
</div>
@endsection
