<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'location_id', 'price', 'image', 'format', 'description', 'company_id'];
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'experience_id');
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(company::class, 'company_id');
    }

}
