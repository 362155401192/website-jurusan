<?php

namespace App\Http\Requests\Web\Backend\Page; // Mengubah namespace

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest // Mengubah nama class
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
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'menu_page' => 'required',
             'file' => 'mimes:png,jpg,jpeg'
        ];
    }
}
