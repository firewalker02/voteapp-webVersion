<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable=['title', 'overview', 'price'];

    public function user(){
        return $this->belongsTo(user::class); //Here we defined that a file belongs to a user
    }
}
