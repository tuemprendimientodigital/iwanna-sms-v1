<?php

namespace App\Models;

use CodeIgniter\Model;
use \DateTime;

class HomeModel extends Model
{
    function getDevicesFilter()
    {
        $id_user = session('id_user');
        $query = $this->db->table('device_ports dp')
            ->select('d.id, d.model,d.ports, d.status, ROUND(CASE WHEN t.status = 3 THEN SUM(t.user_price) ELSE 0 END,2) AS profit')
            ->join('devices d', 'dp.device_id=d.id', 'LEFT')
            ->join('simcards s', 's.port_device_id = dp.id', 'LEFT')
            ->join('transactions t', 't.id_number = s.id', 'LEFT')
            ->where('dp.device_id=d.id')
            ->where('d.user_id', $id_user)
            ->groupBy('d.id')
            ->get();
        return $query->getResult();
    }

    function getIncomingToday()
    {
        $date = date('Y-m-d');
        $id_user = session('id_user');
        $current_start = new DateTime($date . '00:00:00');
        $current_finish = new DateTime($date . '23:59:59');
        $query = $this->db->table('transactions t')
            ->select('ROUND(SUM(t.user_price), 2) AS price')
            ->join('simcards s', 't.id_number=s.id', 'LEFT')
            ->join('device_ports dp', 's.port_device_id=dp.id', 'LEFT')
            ->where('t.status', '3')
            ->where('s.user_id', $id_user)
            ->where('t.transaction_date BETWEEN "' . $current_start->format('Y-m-d H:i:s') .  '" AND "' . $current_finish->format('Y-m-d H:i:s') . '"')
            ->get();
        return $query->getFirstRow();
    }
}
