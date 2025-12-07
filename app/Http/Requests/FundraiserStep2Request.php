<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FundraiserStep2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_relationship' => 'required|string|max:100',
            'beneficiary_contact' => 'required|string|max:20',
            'beneficiary_address' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'beneficiary_name.required' => 'Beneficiary name is required',
            'beneficiary_relationship.required' => 'Please specify your relationship to the beneficiary',
            'beneficiary_contact.required' => 'Beneficiary contact number is required',
            'beneficiary_address.required' => 'Beneficiary address is required',
            'beneficiary_address.max' => 'Address cannot exceed 500 characters',
        ];
    }
}
