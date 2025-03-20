<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Experience;

class Company extends Model
{
       use HasFactory;

        protected $fillable = ['name'];
        public function experiences(): HasMany
        {
            return $this->hasMany(Experience::class, 'company_id');
        }
}
