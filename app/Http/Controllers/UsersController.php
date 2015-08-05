<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:51
 */

namespace App\Http\Controllers;


use App\Entities\User;
use App\Http\Repositories\UserRepo;
use App\Http\Requests\UserCreateRequest;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;


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

    public function postCreate(UserCreateRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->back();
    }

    public function getDel($id = null)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}