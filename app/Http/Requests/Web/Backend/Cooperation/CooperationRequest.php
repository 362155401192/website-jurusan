<?php

namespace App\Http\Requests\Web\Backend\Cooperation;

use Illuminate\Foundation\Http\FormRequest;

class CooperationRequest extends FormRequest
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
            'name' => 'required',
            'benefit'=> 'required',
            'date_start'=> 'required',
            'date_end' => 'required',
            'link' => "required",

        ];
    }
}
