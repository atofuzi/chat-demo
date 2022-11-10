<?php

namespace App\Service;
use App\Models\User;

class UserService {
  protected $user;

  public function __construct (User $user)
  {
    $this->user = $user;  
  }

  public function getUser ($id) {
    return $this->user->find($id);
  }

  public function getAllUsers () {
    $users =  $this->user->all();
   
    $users = $users->map(function ($user) {
      return $user->posts->map(function ($post) use ($user) {
        ['author' => $post->id ];
      });
      return $user;
    });
    return $users;
  }

  public function setAttribute ($user) {
    return $user->posts;
  }
}