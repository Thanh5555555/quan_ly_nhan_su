<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            'price' => 'required|numeric',
            'type'=> 'required',
            'content' => 'required',
            'employee_id' => 'required',
            'day' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'price.required' => 'Vui lòng nhập.',
            'price.numeric' => 'Vui lòng nhập số..',
            'type'=> 'Vui lòng nhập.',
            'content' => 'Vui lòng nhập.',
            'employee_id' => 'Vui lòng chọn.',
            'day' => 'vui lòng chọn',
        ];
    }
}
