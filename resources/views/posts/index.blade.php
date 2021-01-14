@extends('layouts.app')
@section('title', '- Latest posts')
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
	@foreach ($posts as $post)
	<div class="row row-cols-2">
		<div class="col-9">
			<img src="/storage/{{$post->image}}" class="img-fluid">
		</div>
		<div class="col-3">
			<div class="row py-3 justify-content-center">
				<div class="d-flex">
					<div class="px-3">
						<a href="/profile/{{$post->user->id}}">
							<img src="{{$post->user->profile->profileImage()}}" style="width: 100px" class="rounded-circle">
						</a>
					</div>
					<div>
						<h3><a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a></h3>
						<div id="app">
							<follow-button user-id="{{$post->user->id}}">
							</follow-button>
						</div>
					</div>
				</div>
			</div>
			<div class="row card card-body">
				<p>{{$post->caption}}</p>
			</div>
		</div>
		<hr class="col-xl-12 my-5">
	</div>
	@endforeach
	<div class="row">
		<div class="col-12 d-flex justify-content-center">
			{{$posts->links()}}
		</div>
	</div>
</div>	
@endsection

