<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateResilienceFunctionCategoryRequest extends FormRequest
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
            'name' => 'required|string|min:2|unique:resilience_function_categories',
            'rf_id' => 'required|integer|exists:resilience_functions,id'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->errorResponse( $validator->errors(), 'Validation errors', Response::HTTP_BAD_REQUEST)
        );

    }

    public function messages() //OPTIONAL
    {
        return [
            'name.required' => 'Resilience function category name is required',
            'name.unique' => 'Resilience function category name already exist',
            'name.min' => 'Enter a valid resilience function category name',
            'name.string' => 'Resilience function name must be a string',
            'rf_id.required' => 'Select a resilience function',
            'rf_id.exists' => 'Resilience function doesn\'t exist'
        ];
    }
}
