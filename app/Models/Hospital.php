<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'region',
        'contact_number',
        'email',
        'latitude',
        'longitude',
        'is_active',
        'website',
        'operating_hours',
        'blood_types_available',
        'bed_capacity',
        'monthly_capacity',
        'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'blood_types_available' => 'array',
        'bed_capacity' => 'integer',
        'monthly_capacity' => 'integer',
    ];

    // Relationships
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function donations()
    {
        return $this->hasMany(BloodDonation::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeByStatus($query, $status)
    {
        if ($status && $status !== 'all') {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeByRegion($query, $region)
    {
        if ($region && $region !== 'all') {
            return $query->where('region', $region);
        }
        return $query;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    // Helper Methods
    public function getStatusBadgeClass()
    {
        return [
            'active' => 'badge-active',
            'pending' => 'badge-pending',
            'inactive' => 'badge-inactive',
        ][$this->status] ?? 'badge-pending';
    }

    public function isBloodBank()
    {
        return !empty($this->blood_types_available);
    }
}
