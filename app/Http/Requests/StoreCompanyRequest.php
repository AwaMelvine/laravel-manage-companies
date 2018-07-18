<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100',
        ];
    }

    /**
     * Return customized validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The company name is required',
            'logo.dimensions' => 'The logo must have minimun dimensions of 100x100 pixels'
        ];
    }
}
