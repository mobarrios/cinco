<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class Company
{

    protected $company;


    public function __construct(Guard $company)
    {
        $this->company = $company;
    }

    public function handle($request, Closure $next)
    {
        $company_code = $request->id;

        if($company_code != null)
        {
          //  $company = \App\Entities\Company::where('code',$company_code)->first();

            Session::put('database', 'base');
            Session::put('company_code','nav01');
        }

        return $next($request);
    }
}
