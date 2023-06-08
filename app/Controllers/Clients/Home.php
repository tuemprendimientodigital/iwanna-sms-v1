<?php

namespace App\Controllers\Clients;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('clients/home/index');
    }

    function get()
    {
        $dp = model('HomeModel');
        $data['getIncomingToday'] = $dp->getIncomingToday();
        $data['getDevices'] = $dp->getDevicesFilter();
        echo json_encode($data);
    }
}
