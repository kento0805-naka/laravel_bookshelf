@extends('app')

@section('title', 'ユーザー検索')

@section('content')
  @include('nav')
	<div class="container">
		<h3>ユーザーを探そう</h3>
		<form class="form-inline d-flex justify-content-center md-form form-sm">
			@csrf
			<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
				aria-label="Search" name="keyword">
			<button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">検索</button>
		</form>
		
	<div class="row">
		@foreach ($users as $user)
			<div class="col-lg-3 col-sm-6 p-1 mb-2">
				<a href="{{ route('users.show', ['name' => $user->name]) }}">
					<div class="card testimonial-card" id="userbox">
						<div class="card-up indigo lighten-1"></div>
						<div class="avatar mx-auto white mt-3">
							<i class="far fa-user" id=user-icon></i>
						</div>
						<div class="card-body">
							<h4 class="card-title">{{ $user->name }}</h4>
							<hr>
							<p>本の登録数: {{ $user->books->count() }}冊</p>
						</div>
					</div>
				</a>
			</div>
		@endforeach
	</div>
</div>
@endsection