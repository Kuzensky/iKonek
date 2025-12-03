<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'province',
        'contact_number',
        'email',
        'latitude',
        'longitude',
        'is_active',
        'website',
        'is_24_7',
        'blood_types_available',
        'bed_capacity',
        'available_beds_this_week',
        'available_beds_this_month',
        'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_24_7' => 'boolean',
        'blood_types_available' => 'array',
        'bed_capacity' => 'integer',
        'available_beds_this_week' => 'integer',
        'available_beds_this_month' => 'integer',
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

    public function scopeByProvince($query, $province)
    {
        if ($province && $province !== 'all') {
            return $query->where('province', $province);
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
