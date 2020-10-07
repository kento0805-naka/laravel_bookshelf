@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
	<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_message')
            <div class="card-text">
							{{ $user->name }}
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
                @method('PUT')
                @include('users.form')
                <button type="submit" class="btn btn-default btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection