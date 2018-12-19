<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'ruc'=>'required|string|max:15|ruc',
            'name'=>'required|string|max:100',
            'slogan'=>'required|string|max:150',
            'address' => 'required|int',
            'id_cont_k' => 'nullable|int',
            'contact_desc' =>'nullable|string|max:120'
        ];
    }
}
