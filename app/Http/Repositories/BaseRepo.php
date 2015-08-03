<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:39
 */

namespace App\Http\Repositories;

abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($datos)
    {
        return $this->model->create($datos);
    }

    public function edit($model, $datos)
    {
        $model->fill($datos);
        $model->save();

        return $model;
    }
}