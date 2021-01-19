<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|celular_com_ddd',
            'cpf' => 'required|cpf|unique:employees,cpf,'.$this->employee->id,
            'zipCode' => 'required|formato_cep',
            'address' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
            'city' => 'required',
            'state' => 'required|max:2',
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'empresa',
            'name' => 'nome',
            'email' => 'e-mail',
            'phone' => 'telefone',
            'zipCode' => 'CEP',
            'address' => 'endereço',
            'neighborhood' => 'bairro',
            'number' => 'número',
            'city' => 'cidade',
            'state' => 'estado'
        ];
    }
}
