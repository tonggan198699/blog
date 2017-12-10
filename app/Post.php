<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
use App\User;

class Post extends Model
{
  protected $guarded = [];

  public function path()
  {
     return "/posts/{$this->id}";
  }

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function replies()
  {
      return $this->hasMany(Reply::class);
  }

  public function addReply($reply)
  {
      $this->replies()->create($reply);
  }

}
