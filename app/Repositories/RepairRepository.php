<?php

namespace App\Repositories;

use App\Models\Repair;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RepairRepository extends AbstractRepository
{
    protected $model = Repair::class;

    /**
     * @param CarbonInterface $from
     * @param CarbonInterface $to
     * @return Collection|Repair[]
     */
    public function getCreatedBetweenDates(CarbonInterface $from, CarbonInterface $to)
    {
        return $this->model->whereBetween('created_at', [
            $from->startOfDay(),
            $to->endOfDay()
        ])->orderBy('created_at', 'asc')->get();
    }
}
