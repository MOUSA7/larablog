<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $rules = [

            'name' => ['required','min:4','max:15'],
            'email' =>['required','email'],
            'photo_id'=>['required'],
            'role_id'=>['required'],
            'password'=>['required'],
            'resume'=>['required' ,'mimes:jpeg,png,jpg,doc,docx,pdf'],
            //
        ];
        if ($this->is_update){
            $rules['photo_id'] = '';
            $rules['password'] = '';
            $rules['resume'] = '';
        }
        if ($this->is_edit){
            $rules['name'] = '';
            $rules['email'] = '';
            $rules['photo_id'] = '';
            $rules['role_id'] = '';
            $rules['password'] = '';
            $rules['resume'] = '';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'title filed is required',
            'name.min' => 'title filed is at least 4',
            'name.max' => 'title filed is maximum 15',
            'photo_id.required' => 'photo filed is required',
            'role_id.required' => 'Role filed is required',
            'resume.required' => 'Resume filed is required',

        ];
    }

}
