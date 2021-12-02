<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProdiRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama_prodi' => ['required', 'string', 'max:191', 'unique:tb_prodi,nama_prodi,'.$this->prodi.''],
            'jurusan_id' => ['required'],
            'fakultas_id' => ['required'],
            'deskripsi' => ['required', 'string'],
        ];
    }
}
