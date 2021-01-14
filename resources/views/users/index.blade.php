@extends('layouts.app')
@section('title', '- Users')
@section('content')
	<div class="container">
		<h1 class="text-center">Here is our users</h1>
		<ol>
			@foreach ($users as $user)
					<li class="my-4">
						<a href="/profile/{{$user->id}}" class="d-flex align-items-center">
							<img src="/storage/@if(isset($user->profile->image)){{$user->profile->image}}"@else(){{"profile/2ztg8QEUjcLh45FYTZz443ExhJDUIlyOQEHoGBpe.jpeg"}}" @endif height="80px" width="80px">
							<p class="mb-0 ml-4">{{$user->name}}</p>
						</a>
					</li>
			@endforeach
		</ol>
	</div>
@endsection