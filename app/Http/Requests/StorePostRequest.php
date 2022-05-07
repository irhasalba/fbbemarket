<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

        if ($this->method() == "PUT") {

            return [
                'title' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
                'meta_tag' => 'required'

            ];
        } else {
            return [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
                'meta_tag' => 'required'
            ];
        }
    }

    /** 
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi',
            'description.required' => 'deskripsi wajib diisi',
            'image.required' => 'gambar tidak boleh kosong',
            'image.mimes' => 'gambar tidak valid'
        ];
    }
}
