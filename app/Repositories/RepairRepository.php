<?php

namespace App\Repositories;

use App\Models\Repair;
use Illuminate\Database\Eloquent\Model;

class RepairRepository extends AbstractRepository
{
    protected $model = Repair::class;
}
