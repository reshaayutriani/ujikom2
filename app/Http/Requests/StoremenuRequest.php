<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
    
        ];
    }

    public function messages()
    {
        return[
            'nama_menu.required'=> 'data nama menu belum di isi',
            'jenis.required'=> 'data jenis belum di isi',
            'harga.required'=>'data harga belum di isi',
            'deskripsi.required'=>'data deskripsibelum di isi',
        ];
    }
}
