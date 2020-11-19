<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository
{
    protected $model = User::class;

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        $data['password'] = Hash::make($data['password']);

        return parent::store($data);
    }

    /**
     * @param Model $user
     * @param array $data
     * @return bool
     */
    public function update(Model $user, array $data) : bool
    {
        if(isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        return parent::update($user, $data);
    }
}
