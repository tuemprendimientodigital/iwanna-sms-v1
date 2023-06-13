<?php

namespace App\Models;

use CodeIgniter\Model;

class DevicesModel extends Model
{
    function getDeviceBy($where)
    {
        $id_user = session('id_user');
        $query = $this->db->table('devices')
            ->where($where)
            ->where('user_id', $id_user)->get();
        return $query->getFirstRow();
    }

    function getAllDevices()
    {
        $id_user = session('id_user');
        $query = $this->db->table('devices')
            ->where('user_id', $id_user)
            ->orderBy('id', 'desc')
            ->get();
        return $query->getResult();
    }
}
