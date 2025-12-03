<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundraiserContribution extends Model
{
    protected $fillable = [
        'fundraiser_id',
        'user_id',
        'amount',
        'status',
        'payment_method',
        'reference_number',
        'payment_proof',
        'notes',
        'verified_at',
        'verified_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::updated(function ($contribution) {
            if ($contribution->isDirty('status') && $contribution->status === 'verified') {
                $contribution->verified_at = now();
                $contribution->save();

                $contribution->fundraiser->updateCurrentAmount();

                event(new \App\Events\ContributionVerified($contribution));
            }
        });
    }

    public function fundraiser()
    {
        return $this->belongsTo(Fundraiser::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeRecent($query, $limit = 10)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }
}
