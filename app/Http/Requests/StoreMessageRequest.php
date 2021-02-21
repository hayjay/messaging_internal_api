<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
         return [
            'message_body' => 'required|max:255',
            'message_subject' => 'required|min:3',
            'author_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'message_body.required' => 'Message body is required!',
            'message_subject.required' => 'Message subject is required!',
            'author_id.required' => 'Author is required!',
        ];
    }
}
