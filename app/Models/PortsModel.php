<?php

namespace App\Models;

use CodeIgniter\Model;

class PortsModel extends Model
{

    function getPortsBy($id_devices)
    {
        $id_user = session('id_user');
        $sql = $this->db->table('device_ports dp')
            ->select(
                "d.id AS id_device, 
                dp.id AS id_port, 
                dp.`port`, 
                dp.imsi, 
                dp.iccid, 
                dp.type,
                dp.`status` as port_status, 
                dp.signal, 
                s.id AS id_simcard, 
                s.number, 
                GROUP_CONCAT(CASE WHEN t.status = 3 THEN t.service_id ELSE NULL END SEPARATOR ',') AS services,
                ROUND(CASE WHEN t.status = 3 THEN SUM(t.user_price) ELSE 0 END,2) AS profit"
            )
            ->join('devices d', 'dp.device_id=d.id', 'LEFT')
            ->join('simcards s', 's.port_device_id = dp.id', 'LEFT')
            ->join('transactions t', 't.id_number = s.id', 'LEFT')
            ->where('dp.device_id', $id_devices)
            ->where('d.user_id', $id_user)
            ->groupBy('dp.port')
            ->orderBy('dp.`port`', 'asc')
            ->get();
        return $sql->getResult();
    }
}
