<?php

namespace App\Http\Requests;

use Input;
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
        if(Input::has('id_comp')){
            $id_comp=Input::get('id_comp');
            return [
                'ruc'=>'required|string|max:15|ruc|unique:companies,ruc,'.$id_comp.',id_comp',
                'name'=>'required|string|max:100',
                'slogan'=>'required|string|max:150',
                'address' => 'required|int'
                ];
        }else{
            return [
                'ruc'=>'required|string|max:15|ruc|unique:companies',
                'name'=>'required|string|max:100',
                'slogan'=>'required|string|max:150',
                'address' => 'required|int'
                //'id_cont_k' => 'nullable|int',
                //'description' =>'nullable|string|max:120'
            ];
        }
    }
}
