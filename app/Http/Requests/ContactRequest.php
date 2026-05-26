<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'firstName' => trim($this->firstName),
            'lastName' => trim($this->lastName),
            'contactNumber' => str_replace(' ',  '', $this->contactNumber ?? ''),
            'email' => strtolower(trim($this->email)),
            'question' => trim($this->question)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation for form inputs from contact_us page
            'firstName' => ['required', 'string', 'min:2', 'max:50'],
            'lastName' => ['required', 'string', 'min:2', 'max:50'],
            'contactNumber' => ['digits:10'],
            'email' => ['required', 'email'],
            'question' => ['required', 'string', 'min:10', 'max:500'],
            'termsAndConditions' => ['accepted'],
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'firstName' => 'first name',
            'lastName' => 'last name',
            'email' => 'email',
            'question' => 'question',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'contactNumber.digits' => 'An Australian contact number must contain 10 digits, please include the area code if you are supplying a landline number',
            'checkbox.accepted' => 'Please accept the terms and conditions',

        ];
    }
}
