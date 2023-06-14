<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    function getTransactions($data)
    {
        $id_user = session('id_user');
        $db = $this->db;
        $builder = $db->table('transactions t');

        $builder->select("t.transaction_date, 
                    t.user_price, 
                    s.number, 
                    t.service_id, 
                    t.status")
            ->join('simcards s', 't.id_number=s.id', 'left')
            ->join('device_ports dp', 's.port_device_id=dp.id', 'left')
            ->where('s.user_id', $id_user);

        // add date
        if (!(empty($data['from']) && empty($data['to']))) {
            $builder->where('DATE(t.transaction_date) BETWEEN "' . $data['from'] . '" AND "' . $data['to'] . '"');
        }

        $query = $builder->get();
        return $query->getResult();
    }
}
