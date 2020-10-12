@extends('app')

@section('title', '本の検索')

@section('content')
  @include('nav') 
  <div class="container">
    @include('error_message')
  <form class="form-inline d-flex justify-content-center md-form form-sm">
		<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
			aria-label="Search" name="keyword">
		<button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">検索</button>
	</form>
    @foreach ($books as $book)
        <ul>
            <li>{{ $book['title'] }}</li>
        <img src="{{ $book['image_url'] }}" alt="">
        </ul>
    @endforeach
  </div>
@endsection