<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:42
 */

namespace App\Http\Repositories;

use App\Entities\Profile;

class ProfileRepo extends BaseRepo {

    public function getModel()
    {
        return new Profile;
    }

    public function ListAndPaginate($paginate = 50, $search = null)
    {
        $qry = $this->model->orderBy('profile')
            ->paginate($paginate);

        return $qry;
    }


}