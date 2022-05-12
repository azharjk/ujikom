<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nik' => 'required|unique:users|numeric',
            'fullname' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK diperlukan',
            'nik.unique' => 'NIK sudah terpakai',
            'nik.numeric' => 'NIK harus berupa angka',
            'fullname.required' => 'Nama lengkap diperlukan'
        ];
    }
}
