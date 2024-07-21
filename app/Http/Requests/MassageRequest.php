<?php

namespace App\Http\Requests;

use App\Helpers\ApiResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MassageRequest extends FormRequest
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
        return
        [
           'title' => 'required',
           'email' => 'required|email',
           'mobile' => 'required',
           'msg' => 'required'
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = ApiResource::getResponse(422,'Validation Errors',$validator->errors());
        // $response = ApiResource::getResponse(422,'Validation Errors',$validator->messages()->all());
        throw new ValidationException($validator, $response);
    }
}
