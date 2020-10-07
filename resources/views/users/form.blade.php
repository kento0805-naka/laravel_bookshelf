@csrf
<div class="form-group">
  <label></label>
  <textarea name="description" required class="form-control" rows="16" placeholder="自己紹介">{{ old($user->description) }}</textarea>
</div>