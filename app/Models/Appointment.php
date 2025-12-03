<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'hospital_id',
        'appointment_date',
        'end_time',
        'status',
        'confirmation_code',
        'reminder_sent',
        'notes',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
        'end_time' => 'datetime',
        'reminder_sent' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appointment) {
            if (!$appointment->confirmation_code) {
                $appointment->confirmation_code = $appointment->generateConfirmationCode();
            }
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function donation()
    {
        return $this->hasOne(BloodDonation::class);
    }

    // Methods
    public function generateConfirmationCode()
    {
        do {
            $code = 'IK-' . strtoupper(Str::random(8));
        } while (self::where('confirmation_code', $code)->exists());

        return $code;
    }

    public function cancel()
    {
        $this->update(['status' => 'cancelled']);
        event(new \App\Events\AppointmentCancelled($this));
    }

    // Scopes
    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>', now())
                    ->where('status', 'confirmed')
                    ->orderBy('appointment_date');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
