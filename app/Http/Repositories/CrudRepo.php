<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:42
 */

namespace App\Http\Repositories;


use App\Entities\Crud;

class CrudRepo extends BaseRepo {

    public function getModel()
    {
        return new Crud();
    }

    public function ListAndPaginate($paginate = 50, $search = null)
    {
        $qry = $this->model->orderBy('profile')
            ->paginate($paginate);

        return $qry;
    }

    public function ListAll()
    {
        $qry = $this->model->all();
        return $qry;
    }

    public function tableHeader()
    {
        $header  = ['Nombre'=>'name',
            'E-mail'=>'email',
            'Perfil'=>'Profile',

            ];

        return $header;
    }

}