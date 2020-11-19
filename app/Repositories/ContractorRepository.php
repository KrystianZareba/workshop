<?php

namespace App\Repositories;

use App\Models\Contractor;

class ContractorRepository extends AbstractRepository
{
    protected $model = Contractor::class;

    /**
     * @param Contractor $contractor
     * @return bool|null
     * @throws \Exception
     */
    public function destroyWithCars(Contractor $contractor) : ?bool
    {
        $contractor->cars()->delete();
        return $contractor->delete();
    }
}
