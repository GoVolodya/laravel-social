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
  <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
		<h1 class="text-center">Edit profile</h1>
    <div class="row">
      <div class="col-8 offset-2">
        <div class="form-group row">
          <label for="gender" class="col-md-4 col-form-label">
						<h2>Gender</h2>
					</label>
					<select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" value="{{$user->profile->gender}}">
						<option @if ($user->profile->gender == 'Prefer not to say') selected @endif value="Prefer not to say">Prefer not to say</option>
						<option @if ($user->profile->gender == 'Male') selected @endif value="Male">Male</option>
						<option @if ($user->profile->gender == "Female") selected								
						@endif value="Female">Female</option>
						<option @if ($user->profile->gender == 'Transgender') selected
						@endif value="Transgender">Transgender</option>
					</select>
					{{-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') ?? $user->profile->gender }}" required autocomplete="gender" autofocus> --}}
					@error('gender')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
					<label for="country" class="col-md-4 col-form-label">
						<h2>Country</h2>
					</label>
					<select name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{$user->profile->country}}">
						<option @if ($user->profile->country == 'Ukraine') selected @endif value="Ukraine">Ukraine</option>
						<option @if ($user->profile->country == 'Another') selected @endif value="Another">Another</option>
					</select>
					{{-- <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') ?? $user->profile->country }}" required autocomplete="country" autofocus> --}}
          @error('country')
            <span class="invalid-feedback" role="alert">
            	<strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="relationship" class="col-md-4 col-form-label">
						<h2>Relationship</h2>
					</label>
					<select name="relationship" id="relationship" class="form-control @error('relationship') is-invalid @enderror" value="{{$user->profile->relationship}}">
						<option @if ($user->profile->relationship == 'None') selected @endif value="None">None</option>
						<option @if ($user->profile->relationship == 'In marriage') selected @endif value="In marriage">In marriage</option>
						<option @if ($user->profile->relationship == 'Have pair') selected @endif value="Have pair">Have pair</option>
					</select>
          {{-- <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ old('relationship') ?? $user->profile->relationship }}" required autocomplete="relationship" autofocus> --}}
          @error('relationship')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
				</div>
        <div class="row">
          <label for="image" class="col-md-4 col-form-label">
						<h2>Profile image</h2>
					</label>
          <input type="file" class="form-control-file" id="image" name="image">
          @error('image')
            <strong>{{ $message }}</strong>
          @enderror
        </div>
        <div class="row pt-4">
					<div class="col text-center">
						<button class="btn btn-primary">Save profile</button>
					</div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection