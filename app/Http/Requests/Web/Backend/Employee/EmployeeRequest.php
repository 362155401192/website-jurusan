<?php

namespace App\Http\Requests\Web\Backend\Employee;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'identity_number' => 'required|numeric',
            'name' => 'required',
            'gender' => 'required',
            'employee_type' => 'required',
            'employee_status' => 'required', // tambahkan validasi untuk employee_status
            'file' => 'mimes:png,jpg,jpeg',
            'id_sdm' => 'nullable|string', // Mengubah validasi menjadi nullable
        ];
    }
}

