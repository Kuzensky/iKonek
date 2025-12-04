<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    // Status constants
    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING_REVIEW = 'pending_review';
    const STATUS_ACTIVE = 'active';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_SUSPENDED = 'suspended';

    // Category constants
    const CATEGORY_MEDICAL = 'medical';
    const CATEGORY_DISASTER = 'disaster_relief';
    const CATEGORY_EDUCATION = 'education';
    const CATEGORY_COMMUNITY = 'community';
    const CATEGORY_OTHER = 'other';

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
        'is_featured',
    ];

    protected $casts = [
        'goal_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
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

    public function scopeSuspended($query)
    {
        return $query->where('status', self::STATUS_SUSPENDED);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            self::STATUS_ACTIVE => 'badge-verified',
            self::STATUS_PENDING_REVIEW => 'badge-pending',
            self::STATUS_SUSPENDED => 'badge-suspended',
            self::STATUS_COMPLETED => 'badge-completed',
            self::STATUS_CANCELLED, self::STATUS_DRAFT => 'badge-cancelled',
            default => 'badge-cancelled',
        };
    }

    public function getStatusDisplayName()
    {
        return match($this->status) {
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_PENDING_REVIEW => 'Pending Review',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_SUSPENDED => 'Suspended',
            default => ucfirst($this->status),
        };
    }

    public function getCategoryBadgeClass()
    {
        return match($this->category) {
            self::CATEGORY_MEDICAL => 'category-medical',
            self::CATEGORY_DISASTER => 'category-disaster',
            self::CATEGORY_EDUCATION => 'category-education',
            self::CATEGORY_COMMUNITY => 'category-community',
            self::CATEGORY_OTHER => 'category-other',
            default => 'category-other',
        };
    }

    public function getCategoryDisplayName()
    {
        return match($this->category) {
            self::CATEGORY_MEDICAL => 'Medical',
            self::CATEGORY_DISASTER => 'Disaster Relief',
            self::CATEGORY_EDUCATION => 'Education',
            self::CATEGORY_COMMUNITY => 'Community',
            self::CATEGORY_OTHER => 'Other',
            default => ucfirst($this->category),
        };
    }

    public function canBeActivated()
    {
        return in_array($this->status, [
            self::STATUS_PENDING_REVIEW,
            self::STATUS_SUSPENDED,
        ]);
    }

    public function canBeSuspended()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function canBeCompleted()
    {
        return in_array($this->status, [
            self::STATUS_ACTIVE,
            self::STATUS_SUSPENDED,
        ]);
    }

    public function toggleFeatured()
    {
        $this->is_featured = !$this->is_featured;
        $this->save();
        return $this->is_featured;
    }
}
