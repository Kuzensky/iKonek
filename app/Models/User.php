<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'birthdate',
        'sex',
        'blood_type',
        'contact_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
        ];
    }

    protected $appends = [
        'total_donations',
        'total_lives_impacted',
        'next_appointment',
        'total_contributions',
        'unread_notifications_count',
    ];

    public function donations()
    {
        return $this->hasMany(BloodDonation::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getTotalDonationsAttribute()
    {
        return $this->donations()->where('status', 'verified')->count();
    }

    public function getTotalLivesImpactedAttribute()
    {
        return $this->donations()->where('status', 'verified')->sum('lives_impacted');
    }

    public function getNextAppointmentAttribute()
    {
        return $this->appointments()
            ->where('status', 'confirmed')
            ->where('appointment_date', '>', now())
            ->orderBy('appointment_date', 'asc')
            ->with('hospital')
            ->first();
    }

    public function createdFundraisers()
    {
        return $this->hasMany(Fundraiser::class);
    }

    public function contributions()
    {
        return $this->hasMany(FundraiserContribution::class);
    }

    public function getTotalContributionsAttribute()
    {
        return $this->contributions()->where('status', 'verified')->sum('amount');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getUnreadNotificationsCountAttribute()
    {
        return $this->notifications()->where('is_read', false)->count();
    }
}
