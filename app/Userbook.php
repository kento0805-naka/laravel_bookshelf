<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Userbook extends Model
{
    protected $fillable = [
        'status', 'user_id', 'book_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
