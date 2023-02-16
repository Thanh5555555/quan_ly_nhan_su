<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogworkRequest extends FormRequest
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
    public function rules()
    {
        return [
             
                   
                'workingday' => 'required|numeric|max:31',
                'month' => 'required',
                'employee_id' => 'required',
        
        ];
        
    }
    public function messages()
    {
        return [
            'workingday.required' => 'Vui lòng nhập.',
            'workingday.numeric' => 'Vui lòng nhập số.',
            'workingday.max' => 'Vui lòng nhập lại.',
            'employee_id' => 'Vui lòng chọn.',
            'month' => 'vui lòng chọn',
        ];
    }
}
