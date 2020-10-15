<ul class="nav nav-tabs nav-justified mt-3">
	<li class="nav-item">
		<a class="nav-link text-muted"
				href="{{ route('users.show', ['name' => $user->name]) }}">
			読書中
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-muted active"
			href="{{ route('users.read', ['name' => $user->name]) }}">
			読了
		</a>
	</li>
</ul>
<div class="card panels-card">
	<div class="card-body grey lighten-5 rounded-bottom">
    <div class="row d-flex">
		@foreach($read_books as $book)
			@include('users/userbook')
		@endforeach
		</div>
	</div>
</div>