<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function getIndex()
    {
        return view($this->view)->with($this->data);
    }

    public function getNew()
    {
        return view($this->form)->with($this->data);
    }

}
