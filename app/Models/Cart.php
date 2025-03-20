<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['experience_id', 'quantity'];
    public function experiences(): BelongsTo
    {
        return $this->belongsTo(Experience::class, 'experience_id');
    }
}
