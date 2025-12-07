<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FundraiserStep4Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payment_method' => 'required|string|max:50',
            'account_number' => 'required|string|max:50',
            'account_name' => 'required|string|max:255',
            'terms_agreed' => 'required|accepted',
            'information_accurate' => 'required|accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'payment_method.required' => 'Please select your bank or e-wallet',
            'account_number.required' => 'Account number is required',
            'account_name.required' => 'Account name is required',
            'terms_agreed.required' => 'You must agree to the Terms and Conditions',
            'terms_agreed.accepted' => 'You must agree to the Terms and Conditions',
            'information_accurate.required' => 'You must confirm that the information is accurate',
            'information_accurate.accepted' => 'You must confirm that the information is accurate',
        ];
    }
}
