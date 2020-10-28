<?php

namespace app\traits;
use App\User;


trait Followable
{
    public function follows()
    {
      return  $this->belongsToMany(User::class , 'follows' , 'user_id', 'following_user_id');
      
      
    }

    public function follow(User $user){

       return   $this->follows()->save($user);

    }

    public function unfollow(User $user){

      return   $this->follows()->detach($user);

   }

    public function following(User $user)
    {
      return   $this->follows()->where('following_user_id' , $user->id)->exists();
    // return   $this->follows()->toggle($user);      a way to know if the follow list contain this user
    // return   $this->follows()->pluck('id')->contains($user->id);
    }

    public function toggleFollow(User $user){

       if ($this->following($user)) {

        return  $this ->unfollow($user);
          
           }else {

            return   $this->follow($user); 
           }
   }

}
