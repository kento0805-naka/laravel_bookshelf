<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\Relations\HasManyThrough;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Book;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    //folowerの取得
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    //引数に渡されたuserがfollowしていたらtrueを返す
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    public function countFollower():int
    {
        return $this->followers->count();
    }

    public function countFollowing():int
    {
        return $this->followings->count();
    }

    public function userbooks()
    {
        return $this->hasMany('App\Userbook');
    }

    public function books()
    {
        return $this->belongsToMany('App\Book', 'App\Userbook')->withTimestamps();
    }

    //Userが登録しているか確認
    public function isRegisterd($book)
    {
        $find_book = $this->books->where('image_url', $book)->first();
        if (isset($find_book)) {
            return true;
        } else {
            return false;
        }
    }
}
