<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = ['contractor_id', 'brand', 'model', 'registration_number', 'production_year', 'engine'];

    /**
     * @return BelongsTo
     */
    public function contractor() : BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }
}
