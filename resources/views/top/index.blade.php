@extends('app')

@section('title', 'トップページ')

@section('content')
  @include('nav') 
  <div class="container">
  <h1 class="mt-3">{{ $header }}</h1>
  </div>
@endsection