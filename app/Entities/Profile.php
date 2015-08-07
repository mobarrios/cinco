<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 4/8/15
 * Time: 15:01
 */

namespace App\Entities;



class Profile  extends Entity{

    protected $table  = 'profiles';


    public function User()
    {
        return $this->hasMany(User::getClass());
    }
}