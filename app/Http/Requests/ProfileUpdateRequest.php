<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'], // 5MB max
            'dateOfBirth' => ['required', 'date', 'before:today'],
            'bloodType' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'gender' => ['nullable', 'in:male,female,other'],
            'phone' => ['required', 'string', 'max:20'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Map form field names to database column names
        $this->merge([
            'birthdate' => $this->dateOfBirth,
            'blood_type' => $this->bloodType,
            'sex' => $this->gender,
            'contact_number' => $this->phone,
        ]);
    }
}
