<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Employee;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|max:255',
            //'gender' => 'required|in:1,2',
            //'birthday' => 'required|date_format:d-m-Y|before:today',
            'phone' => 'required|numeric|digits:10',
            'salary' => 'required|numeric|digits_between:7,9',
            'email' => 'email|required|unique:employees,email,' . $this->request->get('employee_id'),
            'address' => 'required',
            //'start_time' => 'required|date_format:d-m-Y',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập.',
            'name.max' => 'Không nhập quá 255 kí tự.',
            'phone.required' => 'Vui lòng nhập.',
            'phone.digits' => 'Vui lòng nhập đúng định dạng.',
            'phone.numeric' => 'Vui lòng nhập số.',
            'email.required' => 'Vui lòng nhập.',
            'email.email' => 'Vui lòng nhập đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'address.required' => 'Vui lòng nhập.',
            'salary.required' => 'Vui lòng nhập.',
            'salary.numeric' => 'Vui lòng nhập số.',
            
        ];
    }
}
