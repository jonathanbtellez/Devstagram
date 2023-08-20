<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        // To send custom values we need add this to the model
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        // 1 define type of relation
        // 2 Pass as argument the class that you want relationate
        // 3. the method select allow us choise want columns we want
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Check if has a register of the user id in the table likes
     */
    public function checkLike(User $user){
        // Contains chek in a param 1 the column  if the param 2 value exists 
        return $this->likes->contains('user_id', $user->id);
    }
}
