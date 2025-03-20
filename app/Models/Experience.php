<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [`title` , `category` , `loation_id` , `price` , `image` , `format` , `description` , `company`];
            public function location(): BelongsTo{
                    return $this->belongsTo(Location::class, 'location_id');
                }
}
