<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFundraiserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'story' => 'nullable|string|max:5000',
            'category' => 'required|in:medical,disaster_relief,education,community,other',
            'goal_amount' => 'required|numeric|min:1000|max:10000000',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_contact' => 'nullable|string|max:20',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'featured_image' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'goal_amount.min' => 'Goal amount must be at least ₱1,000.',
            'goal_amount.max' => 'Goal amount cannot exceed ₱10,000,000.',
            'end_date.after' => 'End date must be after start date.',
        ];
    }
}
