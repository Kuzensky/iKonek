<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FundraiserStep3Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'organizer_name' => 'required|string|max:255',
            'organizer_email' => 'required|email|max:255',
            'organizer_phone' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'organizer_name.required' => 'Your full name is required',
            'organizer_email.required' => 'Email address is required',
            'organizer_email.email' => 'Please enter a valid email address',
            'organizer_phone.required' => 'Phone number is required',
        ];
    }
}
