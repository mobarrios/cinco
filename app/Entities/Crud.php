<?php
namespace App\Entities;


class Crud extends Entity{

    protected $table = 'users';

    public function Profile()
    {
        return $this->hasMany(Profile::getClass());
    }

}