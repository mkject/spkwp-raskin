<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternativeRequest extends FormRequest
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
            'alternatif' => [
                'string',
                'required',
                'max:255'
            ],
            'c1_alternatif' => [
                'integer',
                'required'
            ],
            'c2_alternatif' => [
                'integer',
                'required'
            ],
            'c3_alternatif' => [
                'integer',
                'required'
            ],
            'c4_alternatif' => [
                'integer',
                'required'
            ],
            'c5_alternatif' => [
                'integer',
                'required'
            ],
            
        ];
    }
}
