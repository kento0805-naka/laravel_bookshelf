<div class="col-lg-3 col-sm-4 p-1 mb-2">
  <div class="card">
		<img class="card-image mx-auto pt-3"　width="180px" height="250px" src="{{ $book->image_url }}" alt="Card image cap">
		@if(Auth::id() === $user->id)
  	<div class="card-body d-flex mx-auto">
			<a href="#" class="btn btn-sm btn-default">読了</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $book->title }}">削除</a>
		</div>
		@else
		<div class="card-body d-flex mx-auto">
			<a href="#" class="btn btn-sm btn-default">本の詳細</a>
		</div>
		@endif
	</div>
</div>

<div id="modal-delete-{{ $book->title }}" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="{{ route('book.destroy', ['book' => $book]) }}">
				@csrf
				@method('DELETE')
				<div class="modal-body">
					{{ $book->title }}を削除します。よろしいですか？
				</div>
				<div class="modal-footer justify-content-between">
					<a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
					<button type="submit" class="btn btn-danger">削除する</button>
				</div>
			</form>
		</div>
	</div>
</div>