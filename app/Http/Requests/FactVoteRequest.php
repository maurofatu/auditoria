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
            'l101' => 'required|min:0',
            'l102' => 'required|min:0',
            'l103' => 'required|min:0',
        ];
    }
}
