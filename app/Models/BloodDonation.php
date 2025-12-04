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

    // Status Constants
    const STATUS_PENDING = 'pending';
    const STATUS_VERIFIED = 'verified';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELLED = 'cancelled';

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

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeFailed($query)
    {
        return $query->where('status', self::STATUS_FAILED);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    public function scopeByStatus($query, $status)
    {
        if ($status && $status !== '' && $status !== 'all') {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeByBloodType($query, $bloodType)
    {
        if ($bloodType && $bloodType !== '' && $bloodType !== 'all') {
            return $query->where('blood_type', $bloodType);
        }
        return $query;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->whereHas('user', function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhereHas('hospital', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    // Helper Methods
    public function getStatusBadgeClass()
    {
        return [
            'pending' => 'badge-pending',
            'verified' => 'badge-verified',
            'failed' => 'badge-failed',
            'cancelled' => 'badge-cancelled',
        ][$this->status] ?? 'badge-pending';
    }

    public function getStatusDisplayName()
    {
        return [
            'pending' => 'Pending',
            'verified' => 'Verified',
            'failed' => 'Failed',
            'cancelled' => 'Cancelled',
        ][$this->status] ?? ucfirst($this->status);
    }

    public function getDonorFullName()
    {
        return trim("{$this->user->first_name} {$this->user->middle_name} {$this->user->last_name}");
    }

    public function getUserInitials()
    {
        $firstName = $this->user->first_name ?? '';
        $lastName = $this->user->last_name ?? '';
        return strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1));
    }
}
