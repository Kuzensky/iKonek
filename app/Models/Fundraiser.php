<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'story',
        'category',
        'goal_amount',
        'current_amount',
        'beneficiary_name',
        'beneficiary_contact',
        'start_date',
        'end_date',
        'status',
        'featured_image',
    ];

    protected $casts = [
        'goal_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contributions()
    {
        return $this->hasMany(FundraiserContribution::class);
    }

    public function verifiedContributions()
    {
        return $this->hasMany(FundraiserContribution::class)->where('status', 'verified');
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->goal_amount == 0) {
            return 0;
        }
        return min(($this->current_amount / $this->goal_amount) * 100, 100);
    }

    public function getDaysRemainingAttribute()
    {
        $now = now();
        $endDate = $this->end_date;

        if ($endDate < $now) {
            return 0;
        }

        return (int) ceil($now->diffInDays($endDate, false));
    }

    public function updateCurrentAmount()
    {
        $this->current_amount = $this->verifiedContributions()->sum('amount');
        $this->save();

        event(new \App\Events\FundraiserProgressUpdated($this));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '>=', now());
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }
}
