<?php

namespace App\Controllers\Clients;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('clients/home/index');
    }
}
