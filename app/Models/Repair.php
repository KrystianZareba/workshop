<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected array $fillable = ['car_id', 'created_by', 'description', 'parts_cost', 'repair_cost', 'repair_time'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
