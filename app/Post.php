<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //TableName
    protected $table="posts";
    //key
    public $primaryKey="id";
    //timestamp
    public $timestamps= true;

    public function user()
    {
      return $this->belongsTo("App\User");
    }
}
