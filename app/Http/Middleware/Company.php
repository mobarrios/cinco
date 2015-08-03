<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class Company
{

    protected $company;


    public function __construct(Guard $company)
    {
        $this->company = $company;
    }

    public function handle($request, Closure $next, $company_id)
    {
        if($company_id != null)
        {
            $data['company_id']     = $company_id;
            $data['company_name']   = 'Nombre Empresa';

            Session::put('company', $data);

        }

        return $next($request);
    }
}
