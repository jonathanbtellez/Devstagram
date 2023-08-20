<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        // To send custom values we need add this to the model
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // create relation
    public function posts() {
        // 1 define type of relation
        // 2 Pass as argument the class that you want relationate
        return $this->hasMany(Post::class);
    }

    public function likes() {
        // 1 define type of relation
        // 2 Pass as argument the class that you want relationate
        return $this->hasMany(Like::class);
    }

    // Save followers
    public function followers(){

        // Manage a relation out of the convention of laravel
        return $this->belongsToMany(User::class, 'followers','user_id','follower_id');
    }

    public function checkFollower(User $user){
        // Contains chek in a param 1 the column  if the param 2 value exists 
        return $this->followers->contains($user->id);
    }

    public function followings(){

        // Manage a relation out of the convention of laravel
        return $this->belongsToMany(User::class, 'followers','follower_id','user_id');
    }

}
