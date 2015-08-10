<?php
namespace App\Entities;


class Crud extends Entity{

    protected $table = 'users';

    public function Perfil()
    {
        return $this->hasMany(Profile::getClass());
    }

}