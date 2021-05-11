<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandRepository extends AbstractRepository
{
    protected $model = Brand::class;

    /**
     * @return Collection|Brand[]
     */
    public function all()
    {
        return $this->model->orderBy('name')->get();
    }

}
