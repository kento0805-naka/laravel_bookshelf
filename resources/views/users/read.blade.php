@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
		@include('users/user_profile')
		@include('users/user_content_read')
  </div>
@endsection