<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contractor extends Model
{
    protected array $fillable = ['first_name', 'last_name'];

    /**
     * @return HasMany
     */
    public function cars() : HasMany
    {
        return $this->hasMany(Car::class);
    }
}
