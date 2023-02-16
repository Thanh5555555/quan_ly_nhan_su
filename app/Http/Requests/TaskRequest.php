<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|max:255',
            'employee_id'=> 'required',
            'content' => 'required',
            'status' => 'required',
            'daywork' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập.',
            'name.max' => 'Không nhập quá 255 kí tự.',
            'employee_id'=> 'Vui lòng nhập.',
            'content' => 'Vui lòng nhập.',
            'status' => 'Vui lòng nhập.',
            'daywork' => 'Vui lòng nhập đúng định dạng.',
        ];
    }
}
