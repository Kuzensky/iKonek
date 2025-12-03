<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
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
        return [
            'hospital_id' => 'required|exists:hospitals,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'donation_date' => 'required|date|before_or_equal:now',
            'notes' => 'nullable|string|max:500',
        ];
    }
}
