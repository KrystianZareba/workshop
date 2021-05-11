<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Repair extends Model
{
    protected $fillable = ['car_id', 'created_by', 'description', 'parts_cost', 'repair_cost', 'repair_date', 'repair_time'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * @return string
     */
    public function repairDate(): string
    {
        return date('Y-m-d', strtotime($this->repair_date));
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
