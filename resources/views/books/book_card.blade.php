<div class="card panels-card">
	<div class="card-body grey lighten-5 rounded-bottom">
    <div class="row">
			@foreach ($books as $book)
      <div class="col-lg-6 col-sm-12 p-1 mb-2">
        <div class="card grey lighten-2">
          <div class="card-body pb-0 row">
						<img src="{{ $book['image_url'] }}" width="165px" height="163px" class="col-4">
						<div class="col-8">
							<a href="{{ $book['item_url'] }}">
							<h5 class="mb-1">{{ $book['title'] }}</h5>
							</a>
							<h6 class="mb-1">{{ $book['author'] }}</h6>
						</div>
          </div>
          <hr>
          <div class="card-body pt-0 ml-auto">
					<form action="{{ route('book.store' )}}" method="POST">
						@csrf
						<input type="hidden" name="title" value="{{ $book['title'] }}">
						<input type="hidden" name="author" value="{{ $book['author'] }}">
						<input type="hidden" name="image_url" value="{{ $book['image_url'] }}">
						<input type="hidden" name="item_url" value="{{ $book['item_url'] }}">
						@if(Auth::user()->isRegisterd($book['image_url']))
							<button type="button" class="btn btn-light-green">登録済み</button>
						@else
							<button type="submit" class="btn btn-light-green">本棚に登録</button>
						@endif
					</form>
        	</div>
				</div>
			</div>
			@endforeach
  	</div>
	</div>
</div>
