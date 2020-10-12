<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Userbook extends Model
{
    protected $fillable = [
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function books()
    {
        return $this->belongsTo('App\Book');
    }
}
