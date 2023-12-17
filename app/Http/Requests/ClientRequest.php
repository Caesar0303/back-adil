<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        $rules = [
            'lastName' => 'string|max:50',
            'firstName' => 'string|max:50',
        ];
    
        if ($this->isMethod('post')) {
            $rules['lastName'] = 'required|string|max:50';
            $rules['firstName'] = 'required|string|max:50';
        }
    
        return $rules;
    }
    
}

