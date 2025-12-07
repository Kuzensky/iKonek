<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FundraiserStep1Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'category' => 'required|in:medical,disaster_relief,education,emergency',
            'description' => 'required|string|min:50|max:2000',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:5120', // 5MB
            'goal_amount' => 'required|numeric|min:1000|max:10000000',
            'campaign_duration' => 'required|in:30,60,90',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Campaign title is required',
            'title.max' => 'Campaign title cannot exceed 100 characters',
            'category.required' => 'Please select a category',
            'description.required' => 'Campaign description is required',
            'description.min' => 'Description must be at least 50 characters',
            'description.max' => 'Description cannot exceed 2000 characters',
            'images.max' => 'You can upload maximum 5 images',
            'images.*.image' => 'Each file must be an image',
            'images.*.mimes' => 'Images must be JPG, PNG, or GIF format',
            'images.*.max' => 'Each image must not exceed 5MB',
            'goal_amount.required' => 'Goal amount is required',
            'goal_amount.min' => 'Goal amount must be at least ₱1,000',
            'goal_amount.max' => 'Goal amount cannot exceed ₱10,000,000',
            'campaign_duration.required' => 'Please select campaign duration',
        ];
    }
}
