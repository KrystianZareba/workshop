<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /** @var string|Model $model */
    protected $model;

    public function __construct()
    {
        $this->model = new $this->model();
    }

    /**
     * @return Collection|Model[]
     */
    public function all()
    {
        return $this->index(0);
    }

    /**
     * @param int $limit
     * @return Collection|Model[]
     */
    public function index($limit = 25){
        $query = $this->model->orderBy('created_at', 'desc');

        if($limit === 0)
            return $query->get();
        else
            return $query->paginate($limit);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        return $this->model->create($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return bool
     */
    public function update(Model $model, array $data) : bool
    {
        return $model->update($data);
    }

    /**
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function destroy(Model $model) : bool
    {
        return $model->delete();
    }
}
