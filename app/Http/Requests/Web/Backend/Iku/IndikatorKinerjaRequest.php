<?php

namespace App\Http\Requests\Web\Backend\Iku;

use Illuminate\Foundation\Http\FormRequest;

class IndikatorKinerjaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sasaran_kegiatan' => 'required|string|max:255',
            'indikator_kinerja_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'triwulan_1_target' => 'nullable|numeric',
            'triwulan_1_realisasi' => 'nullable|numeric',
            'triwulan_2_target' => 'nullable|numeric',
            'triwulan_2_realisasi' => 'nullable|numeric',
            'triwulan_3_target' => 'nullable|numeric',
            'triwulan_3_realisasi' => 'nullable|numeric',
            'target_akhir' => 'nullable|numeric',
            'realisasi_akhir' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'sasaran_kegiatan.required' => 'Sasaran Kegiatan wajib diisi.',
            'indikator_kinerja_kegiatan.required' => 'Indikator Kinerja wajib diisi.',
            // dst...
        ];
    }
}
