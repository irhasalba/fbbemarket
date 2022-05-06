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
        return false;
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
            'description' => 'required',
            'image' => 'required|mimetypes:image/jpg,image:png,image:jpeg',
            'meta_tag' => 'required'

        ];
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
            'image.mimetypes' => 'gambar tidak valid'
        ];
    }
}
