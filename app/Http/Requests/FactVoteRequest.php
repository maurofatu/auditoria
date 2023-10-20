<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactVoteRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'munvot' => 'required',
            'lugvot' => 'required',
            'mesvot' => 'required',
            'election' => 'required',            
            'vote1' => '',            
            'vote2' => '',            
            'vote3' => '',            
            'vote4' => '',            
            'vote5' => '',            
            'vote6' => '',            
            'vote7' => '',            
            'vote8' => '',            
            'vote9' => '',            
            'vote10' => '',            
            'vote11' => '',            
            'vote12' => '',            
            'vote13' => '',            
            'vote14' => '',            
            'vote15' => '',            
            'vote16' => '',            
            'vote17' => '',   
            'vote18' => '',
            'vote19' => '',
            'vote20' => '',
            'vote21' => '',
            'vote22' => '',
            'vote23' => '',
            'vote24' => '',
            'vote25' => '',
            'vote26' => '',
            'vote27' => '',
            'vote28' => '',
            'vote29' => '',
            'vote30' => '',
            'vote31' => ''
        ];
    }
}
