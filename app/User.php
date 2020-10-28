<?php

namespace App;

use App\Tweet;
use App\traits\Followable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable , Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'user',
        'username',
        'email',
        'avatar',
       
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


    public function timeline()
    {
        $friends= $this->follows->pluck('id');
        
         return Tweet::whereIn('user_id' ,$friends)
         ->orWhere('user_id' , $this->id)
         ->latest()->get();
        
    }
        
    public function getAvatarAttribute ($value)
    {
        return asset($value);
    }

  


  public function tweets(){

       return   $this->hasMany(Tweet::class)->latest();

    }

/* public function getRouteKeyName()
 { 
   return 'name';
  }*/
 
public function path($append=' ')
{
   $path=route('profile' , $this->username);

   return $append ? "{$path}/{$append}" : $path;
}

}