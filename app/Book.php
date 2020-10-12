<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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

    public function books():HasManyThrough
    {
        $this->HasManyThrough('App\User', 'App\Userbook');
    }
}
