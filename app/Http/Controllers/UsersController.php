<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:51
 */

namespace App\Http\Controllers;


use App\Http\Repositories\UserRepo;
use App\Http\Requests\UserCreateRequest;
use App\Http\Helpers\Helper;


class UsersController extends Controller {

    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function store(UserCreateRequest $request)
    {
        $datos = $request->only('username', 'password');

        $this->userRepo->create($datos);
    }

    public function name()
    {

    dd($this->userRepo->find(1));


    }
}