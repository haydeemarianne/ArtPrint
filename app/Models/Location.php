<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

        protected $fillable = [`name`];
        public function experiences(): HasMany{
                return $this->hasMany(Experience::class, 'location_id');
            }
}
