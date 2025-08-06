<?php

namespace App\Http\Requests\Web\Backend\Achievement;

use Illuminate\Foundation\Http\FormRequest;

class AchievementProgramStudiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Ubah sesuai dengan logika otorisasi yang Anda butuhkan
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
            'name' => 'required',
            // Tambahkan aturan validasi lain yang sesuai dengan kebutuhan
        ];
    }
}
