<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'appointment_date' => 'required|date|after:now',
            'end_time' => 'required|date|after:appointment_date',
            'notes' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'appointment_date.after' => 'Appointment must be scheduled for a future date.',
            'end_time.after' => 'End time must be after start time.',
        ];
    }
}
