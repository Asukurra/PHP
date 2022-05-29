@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{  $post->image  }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="px-3">
                        <img src="{{  $post->user->profile->profileImage()  }}" class="rounded-circle w-100" style="max-width:50px;">
                    </div>
                    <div>
                        <div><strong>
                            <a href="/profile/{{  $post->user->id  }}">
                            <span class="text-dark">{{  $post->user->username  }}</a></span> <span>  |  
                            </span>

                            <!-- <follow-button user-id="{{  auth()->user()->id  }}" follows="{{  auth()->user()  ? auth()->user()->following->contains(auth()->user()) : false  }}"></follow-button> -->
                            
                        </strong></div>
                    </div>
                </div>
                
                <hr>

                <p>{{  $post->caption  }}</p>
            </div>
        </div>
    </div>    
</div>
@endsection
