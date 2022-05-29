@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-4">
            <a href="/profile/{{  $post->user->id  }}">
                <img src="/storage/{{  $post->image  }}" class="w-100 pb-4">
            </a>
        </div>
        <div class="col-6">
            <div>
                <div class="d-flex align-items-center">
                    <div class="px-3">
                        <img src="{{  $post->user->profile->profileImage()  }}" class="rounded-circle w-100" style="max-width:50px;">
                    </div>
                    <div>
                        <div><strong>
                            <a href="/profile/{{  $post->user->id  }}">
                            <span class="text-dark">{{  $post->user->username  }}</a></span>
                        </strong></div>
                    </div>
                </div>
                
                <hr>

                <p>{{  $post->caption  }}</p>
            </div>
        </div>
    </div>    
    @endforeach

    <div class="row">
        <div class="col-12">
            {{  $posts->links()  }}
        </div>
    </div>
    
</div>
@endsection
