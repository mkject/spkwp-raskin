<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WargaFormRequest extends FormRequest
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
            'nik' => [
                'required',
                'string',
                'max:16'
            ],
            'nama' => [
                'required',
                'string'
            ],
            'tempat_tinggal' => [
                'required',
                'string',
                'max:30'
            ],
            'alamat_lengkap' => [
                'required',
                'string',
                'max:255'
            ],
            'umur' => [
                'required',
                'integer',
            ],
            'pekerjaan' => [
                'required',
                'string'
            ],
            'penghasilan' => [
                'required',
                'integer',
                'max:11'
            ],
            'status' => [
                'required',
                'string'
            ],
            'jumlah_tanggungan' => [
                'required',
            ]
        ];
    }
}
