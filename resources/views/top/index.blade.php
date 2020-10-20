@extends('app')

@section('title', 'トップページ')

@section('content')
  @include('nav') 
  <div class="container">
    <header class="" id="toppage-header">
      <div id="top-container">
        <h2 id='top-title'>自分の本棚を作ろう</h2>
        <div class="row" id="top-buttons">
          @guest
            <a class="col-12" href="{{ route('login')}}"><button class="btn btn-md btn-default top-button">ログイン</button></a>
            <a class="col-12" href="{{ route('register')}}"><button class="btn btn-md btn-outline-default top-button">登録</button></a>
          @endguest
        </div>
      </div>
    </header>
    
  </div>
@endsection