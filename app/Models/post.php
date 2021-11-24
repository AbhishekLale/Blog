<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function comments(){
        return $this->hasMany('App\Models\Comment','post_id','id');
    }
    public function user(){
        return $this->hasOne('app\Models\User', 'id','user_id');
    }
}
