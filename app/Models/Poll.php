<?php

namespace App\Models;

use App\Enums\PollStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
   protected $guarded =[];
    public function options(){
        return $this->hasMany(Option::class);
    }
protected $fillable =['title','end_date','start_date','status','created_by','status'];
    // protected $casts=[
    //     'status' =>PollStatus::class];
    
}
