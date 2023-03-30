<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class createPollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

     public function prepareForValidation(){
        //dd($this->all()); //die and dump data when validating

        $this->merge([
           'created_by' =>auth()->id(),
            'start_at' =>Carbon::parse($this->start_date . $this->start_time)->toDateTimeString(),//concatenate start date and time together using Carbon
            'end_at' =>Carbon::parse($this->end_date . $this->end_time)->toDateTimeString(),//concatenate start date and time together using Carbon
        
        ]);
        dd($this->all()); //die and dump data when validating
     }
    public function rules()
    {
        return [
            'title' => ['required','string'],
            'start_at'=> ['required','date','after_or_equal:now'],
            'end_at'=> ['required','date','after:start_at'],
        ];
    }
}
