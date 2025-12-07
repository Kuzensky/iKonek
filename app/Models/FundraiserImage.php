<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundraiserImage extends Model
{
    protected $fillable = [
        'fundraiser_id',
        'image_path',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    // Relationships
    public function fundraiser()
    {
        return $this->belongsTo(Fundraiser::class);
    }

    // Accessors
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
