<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

//use Illuminate\Validation\Rules\Enum;

    enum PollStatus : string {

    case PENDING ='PENDING';
    case STARTED ='STARTED';
    case FINISHED ='FINISHED';

}

