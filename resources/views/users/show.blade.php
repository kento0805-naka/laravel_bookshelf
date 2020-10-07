@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="ml-lg-4">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            	<i class="fas fa-user-circle fa-3x"></i>
            </a>
          </div>
          
          <div class="mt-3 ml-3" id="user-follow-info">
            <a href="" class="text-muted pr-lg-3">
              12 登録
            </a>
            <a href="" class="text-muted pr-lg-3">
              10 フォロー
            </a>
            <a href="" class="text-muted pr-lg-3">
              10 フォロワー
            </a>
        	</div>
				</div>
				<div class="d-flex flex-row">
					<h2 class="h5 card-title mt-1 ml-lg-4 col">
						<a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
							{{ $user->name }}
						</a>
					</h2>
					@if( Auth::id() !== $user->id )
							<follow-button
								class="ml-auto col"
								:initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
								:authorized='@json(Auth::check())'
  							endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
							>
							</follow-button>
					@endif
				</div>
        
			</div>
      <div class="card-body">
        <div class="card-text">ここに自己紹介文</div>
      </div>
    </div>
  </div>
@endsection