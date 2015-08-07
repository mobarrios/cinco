<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:51
 */

namespace App\Http\Controllers;


//use App\Http\Repositories\UserRepo;
//use App\Http\Requests\UserCreateRequest;
//use App\Http\Helpers\Helper;


class HomeController extends Controller {

    public $view ;
    public $data;

    public function __construct()
    {
        $this->view = 'home';
        $this->data['sectionName'] = 'HOME';
    }
}