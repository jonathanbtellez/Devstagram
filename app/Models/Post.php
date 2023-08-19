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
}
