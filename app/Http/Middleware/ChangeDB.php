<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class ChangeDB
{

    protected $ChangeDB;


    public function __construct(Guard $ChangeDB)
    {
        $this->ChangeDB = $ChangeDB;
    }

    public function handle($request, Closure $next)
    {

        Config::set('database.connections.mysql.database','base');
        DB::setDefaultConnection('mysql');

        return $next($request);
    }
}
