<?php

namespace App\Http\Requests\Web\Backend\Achievement;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'achievement_type_id' => 'required',
            'achievement_level_id' => 'required',
            'achievement_program_studi_id' => 'required',
            'file' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'date' => 'required|date',
            'description' => 'required|string',

            // kolom tambahan
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'juara' => 'required|string|max:100',
            'dosen_pembimbing' => 'required|string|max:255',
            'link_sertifikat' => 'nullable|url|max:500',
        ];
    }

}
