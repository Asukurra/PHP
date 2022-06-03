@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($users as $user)
    <div class="row">
        <div class="col-4">
            <a href= "/profile/{{  $user->id  }}" class="w-100">
                <img src="{{  $user->profile->profileImage()  }}" class="w-75 border">
            </a>
            <div class="invisible">  _ </div>
        </div>
        <div class="col-8">
            <div>
                <div class="d-flex align-items-center">
                    <div class="px-3">
                        <img src="{{  $user->profile->profileImage()  }}" class="rounded-circle w-100" style="max-width:50px;">
                    </div>
                    <div>
                        <div><strong>
                            <a href="/profile/{{  $user->id  }}">
                            <span class="text-dark">{{  $user->username  }}</a></span>
                        </strong></div>
                    </div>
                </div>
                
                <hr>
                <div>
                    <p>{{  $user->profile->description  }}</p>
                </div>
                
            </div>
        </div>
    </div>    
    @endforeach

    <div class="row">
        <div class="col-12">
            {{  $users->links()  }}
        </div>
    </div>
    
</div>
@endsection
