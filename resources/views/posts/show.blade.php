@extends('layouts.app')
@section('profile-link')
@auth
<div class="d-flex align-items-center justify-content-around">
	<a href="{{route('profile.show', auth()->user()->id)}}">
		<div class="pr-3">
			<img src="{{auth()->user()->profile->profileImage()}}" style="width: 50px" class="rounded-circle">
		</div>
	</a>
	<a href="{{route('profile.show', auth()->user()->id)}}" class="text-body">
		<h3>{{auth()->user()->name}}</h3>
	</a>
</div>
@endauth
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-9">
			<img src="/storage/{{$post->image}}">
		</div>
		<div class="col-3">
			<div class="d-flex align-items-center">
				<a href="/profile/{{$post->user->id}}" class="px-3 py-3">
					<img src="{{$post->user->profile->profileImage()}}" style="width: 100px" class="rounded-circle">
				</a>
				<div class="d-flex flex-column justyfi-content-center">
					<a class="h3 text-body" href="/profile/{{$post->user->id}}">{{$post->user->name}}</a>
					<follow-button user-id="{{$post->user->id}}" follows="{{$follows}}">
					</follow-button>
				</div>
			</div>
			<div class="card card-body">
				<p class="mb-0">{{$post->caption}}</p>
			</div>
		</div>
	</div>
</div>
@endsection