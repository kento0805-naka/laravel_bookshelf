<div class="card panels-card">
	<div class="card-body grey lighten-5 rounded-bottom">
    <div class="row">
			@foreach ($books as $book)
      <div class="col-lg-6 col-sm-12 p-1 mb-2">
        <div class="card grey lighten-2">
          <div class="card-body pb-0 row">
						<img src="{{ $book['image_url'] }}" alt="" class="col-3">
						<div class="col-9">
							<a href="{{ $book['item_url'] }}">
							<h5 class="mb-1">{{ $book['title'] }}</h5>
							</a>
							<h6 class="mb-1">{{ $book['author'] }}</h6>
						</div>
          </div>
          <hr>
          <div class="card-body pt-0">
					<form action="{{ route('book.store' )}}" method="POST">
						@csrf
						<input type="hidden" name="title" value="{{ $book['title'] }}">
						<input type="hidden" name="author" value="{{ $book['author'] }}">
						<input type="hidden" name="image_url" value="{{ $book['image_url'] }}">
						<input type="hidden" name="item_url" value="{{ $book['item_url'] }}">
						<button type="submit" class="btn btn-light-green">本棚に登録</button>
					</form>
        	</div>
				</div>
			</div>
			@endforeach
  	</div>
	</div>
</div>

{{-- <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">本棚に登録</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        本のステータスを「読了」か「読書中」かお選びください。
      </div>
      <div class="modal-footer md-form">
				<input type="hidden" name="">
        <button type="button" class="btn btn-secondary">読了</button>
        <button type="button" class="btn btn-primary">読書中</button>
      </div>
    </div>
  </div>
</div> --}}
