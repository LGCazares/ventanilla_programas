<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExampleRequest extends FormRequest
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
            'concepto' => 'required',
            'anio' => 'required|numeric',
            'costo' => 'required|numeric|gt:0',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Campo obligatorio',
            '*.gt' => 'El campo debe ser mayor a 0',
        ];
    }

     /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'costo' => str_replace(',', '', $this->costo),
        ]);
    }
}
