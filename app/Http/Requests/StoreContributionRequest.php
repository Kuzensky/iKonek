<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContributionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:50|max:100000',
            'payment_method' => 'required|in:cash,gcash,paymaya,bank_transfer,other',
            'reference_number' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.min' => 'Minimum contribution amount is ₱50.',
            'amount.max' => 'Maximum contribution amount is ₱100,000.',
        ];
    }
}
