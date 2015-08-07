<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Repositories\UserRepo as Repo;



class CrudController extends Controller {


    protected $repo;

    public $view ;
    public $form;
    public $data;

    public function __construct(Repo $repo)
    {
        $this->view                 = 'crud.index';
        $this->form                 = 'crud.form';
        $this->data['models']       = $repo->ListAll();
        $this->data['tableHeader']  = $repo->tableHeader();
        $this->data['sectionName']  = 'CRUD';
    }





}