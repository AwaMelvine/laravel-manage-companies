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
          'firstName' => 'required',
          'lastName' => 'required',
          'email' => 'sometimes|email'
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
          'firstName.required' => 'Employee first name is required',
          'lastName.required' => 'Employee last name is required',
          'email.email' => 'The email address provided is not valid'
      ];
  }

}
