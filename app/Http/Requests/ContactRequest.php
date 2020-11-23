<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>['required','max:12','min:3'],
            'email'=>['required','email'],
            'subject'=>['required','max:24','min:8'],
            'message'=>['required','max:200','min:12'],
            //
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'email filed is required',
            'name.required' => 'name filed is required',
            'name.min' => 'name filed is at least 3',
            'name.max' => 'name filed is maximum 12',
            'subject.min' => 'subject filed is at least 12',
            'subject.max' => 'subject filed is maximum 24',
            'subject.required' => 'subject filed is required',
            'message.required' => 'message filed is required',
            'message.min' => 'message filed is at least 12',
            'message.max' => 'message filed is maximum 50',

        ];
    }
}
