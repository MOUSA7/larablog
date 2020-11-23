<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
            'title' => ['unique:blogs','required','min:6','max:22'],
            'body' =>['required','min:15','max:500000'],
            'photo_id'=>['required'],
            'meta_desc'=>['required'],
            'category_id'=>['required'],

            //
        ];
        if ($this->is_edit == 1){
           $rules['title'] = 'required';
            $rules['photo_id'] = '';
        }
        if ($this->status == 1 OR 0){
            $rules['status'] = '';
        }
        return $rules;
    }

    public function messages()
    {
        return [
          'title.required' => 'title filed is required',
            'title.unique' => 'title filed is unique',
            'title.min' => 'title filed is at least 6',
            'title.max' => 'title filed is maximum 22',
            'body.required' => 'body filed is required',
            'body.min' => 'body filed is at least 15',
            'body.max' => 'body filed is maximum 500000',
            'photo_id.required' => 'Please enter your photo blog',
            'meta_desc.required' => 'Please enter your Description',
            'category_id.required' => 'Please enter your Category',
        ];
    }
}
