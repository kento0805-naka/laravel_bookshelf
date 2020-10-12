<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'image_url', 'item_url'
    ];

    public function userbooks():HasMany
    {
        $this->hasMany('App\Userbook');
    }

    public function users():BelongsToMany
    {
        $this->belongsToMany('App\User', 'App\Userbook');
    }
}
