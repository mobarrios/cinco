<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 4/8/15
 * Time: 15:01
 */

namespace App\Entities;

use App\Http\Repositories\UserRepo;

class Profile  extends Entity{

    protected $table  = 'profiles';


    public function User()
    {
        $user = new UserRepo();
        return $this->hasMany($user->getModel());
    }
}