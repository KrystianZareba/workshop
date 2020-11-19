<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /** @var Model $model */
    protected $model;

    public function __construct()
    {
        $this->model = new $this->model();
    }

    /**
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function index($limit = 25){
        if($limit === 0)
            return $this->model->all();
        else
            return $this->model->paginate($limit);
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
