<?php

namespace App\Repository\Role;

use App\Role;
use Thortech\Interfaces\RepositoryInterface;

/**
 * ini class yang menghubungkan driver
 * eloquent dengan user repository.
 */
class RoleRepositoryEloquent implements RepositoryInterface
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * refrensinya ada di interface  UserRepositoryInterface.
     */
    public function getItems()
    {
        return $this->model->all();
    }

    /**
     * refrensinya ada di interface RepositoryInterface.
     */
    public function findItem($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * refrensinya ada di interface RepositoryInterface.
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * refrensinya ada di interface RepositoryInterface.
     */
    public function update($id, $request)
    {
        $model = $this->model->findOrFail($id);
        if (!$model->fill($request)->save()) {
            throw new Exception('update fail in class '.static::class, 1);
        }
        return $model;
    }

    /**
     * refrensinya ada di interface RepositoryInterface.
     */
    public function insert($request)
    {
        $model = $this->model->newInstance($request);
        if (!$model->save()) {
            throw new Exception('insert fail in class '.static::class, 1);
        }
        return $model;
    }
}
