<?php

namespace App\Http\Requests\Web\Backend\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeProgramStudiRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Dapatkan aturan validasi yang diterapkan pada permintaan ini.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required', // Sesuaikan aturan validasi dengan kebutuhan
        ];
    }
}
