<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;

class Post extends Model
{
  protected $guarded = [];


  public funtion replies()
  {
    return $this->hasMany(Reply::class);
  }

}
