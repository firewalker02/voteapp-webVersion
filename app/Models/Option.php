<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
protected $fillable=['poll_id','options','ImageName'];
    public function poll(){
        return $this->belongsToMany('App\Models\Poll','poll_id');
    }
}
