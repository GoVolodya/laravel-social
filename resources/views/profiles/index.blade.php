@extends('layouts.app')
@section('content')
<div class="container d-flex">
    <div class="row">
        <div class="col-4">
            <div class="col-12">
                <img src="{{$user->profile->profileImage()}}" class="rounded img-fluid">
            </div>
                <a href="{{route('users')}}" class="btn btn-primary col-12 mt-3">All users</a>
            
            <div class="col-12 card mt-3 pt-3">
                <h2 class="pl-2 py-2 card"><strong>Subscribers:</strong></h2>
                @foreach ($followers as $follower)
                <div class="d-flex pb-3 align-items-center">
                    <a href="/profile/{{ $follower->id }}" class="px-3">
                        <img src="{{$follower->profile->profileImage()}}"  style="width:80px" class="rounded-circle">
                    </a>
                    <div>
                        <a href="/profile/{{$follower->id}}" class="h2 text-body">{{$follower->name}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-8">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <h1><strong>{{$user->name}}</strong></h1>
                    <div class="pl-4">
                        @can('update', $user->profile)
                            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                        @endcan
                    </div>
                </div>
                <div id="app">
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}">
                    </follow-button>
                </div>
            </div>
            <div>
                <div class="py-2">
                    <a class="h2 text-body" data-toggle="collapse" href="#collapseBaseInfo" aria-expanded="false" aria-controls="collapseBaseInfo"><strong>Base information</strong></a>
                </div>
                <div class="collapse" id="collapseBaseInfo">
                    <div class="card card-body">
                        <p class="my-1">Birthday: {{$user->profile->birthday}}</p>
                        <p class="my-1">Gende: {{$user->profile->gender}}</p>
                        <p class="my-1">Country: {{$user->profile->country}}</p>
                    </div>
                </div>
                <div class="py-2">
                    <a class="h2 text-body" data-toggle="collapse" href="#collapsePersonalInfo" aria-expanded="false" aria-controls="collapsePersonalInfo"><strong>Personal information</strong></a>
                </div>
                <div class="collapse" id="collapsePersonalInfo">
                    <div class="card card-body">
                        <p class="my-1">Family: {{$user->profile->family ?? 'Prefer not to say'}}</p>
                        <p class="my-1">Relationship: {{$user->profile->relationship}}</p>
                        <p class="my-1">Religion: </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-2">
                <div class="h2">Subscribers: {{ $followersCount }}</div>
                <div class="h2">Posts: {{$postsCount}}</div>
                <div class="h2">Subscribed for: {{$user->following->count()}}</div>
            </div>
            <div class="card py-3 px-4">
                @can('update', $user->profile)
                    <a href="/post/create" class="btn btn-secondary mb-3">Add new post</a>
                @endcan
                @foreach ($user->posts as $post)
                <div class="card py-3 px-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <a href="/profile/{{$user->id}}" class="px-3">
                            <img src="{{$post->user->profile->profileImage()}}" style="width: 80px" class="rounded-circle">
                        </a>
                        <div class="d-flex flex-column justify-content-center">
                            <a href="/profile/{{$user->id}}" class="text-body h2">{{$post->user->name}}</a>
                            <div>{{$post->created_at}}</div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="/post/{{$post->id}}"><img src="/storage/{{$post->image}}" class="img-fluid"></a>
                        </div>
                        <div>
                            <p class="my-3">{{$post->caption}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><img src="/svg/like.svg" style="width: 30px"></div>
                            <div><img src="/svg/share.svg" style="width: 30px"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
