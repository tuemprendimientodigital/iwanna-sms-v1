<?php

namespace App\Controllers\Clients;

use App\Controllers\BaseController;

class Devices extends BaseController
{
    public function index()
    {
        return view('clients/devices/index');
    }

    function getAll()
    {
        $DevicesModel = model('DevicesModel');
        $data['data'] = $DevicesModel->getAllDevices();
        echo json_encode($data);
    }
}
