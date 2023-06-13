<?php

namespace App\Controllers\Clients;

use App\Controllers\BaseController;

class Ports extends BaseController
{
    public function index($id)
    {
        $DevicesModel = model('DevicesModel');
        $data['device'] = $DevicesModel->getDeviceBy(array("id" => trim($id)));
        return view('clients/ports/index', $data);
    }

    function getAll($id_device = NULL)
    {
        $PortsModel = model('PortsModel');
        $data['data'] = $PortsModel->getPortsBy($id_device);
        echo json_encode($data);
    }
}
