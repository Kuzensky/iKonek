<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    protected $fillable = [
        'user_id',
        'hospital_id',
        'appointment_id',
        'donation_date',
        'blood_type',
        'status',
        'lives_impacted',
        'notes',
    ];

    protected $casts = [
        'donation_date' => 'datetime',
        'lives_impacted' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Scopes
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeRecent($query, $limit = 10)
    {
        return $query->orderBy('donation_date', 'desc')->limit($limit);
    }
}
