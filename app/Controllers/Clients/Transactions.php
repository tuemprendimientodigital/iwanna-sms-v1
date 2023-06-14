<?php

namespace App\Controllers\Clients;

use App\Controllers\BaseController;

class Transactions extends BaseController
{
    protected $request;
    function __construct()
    {
        $this->request = request();
        helper('date');
    }

    public function index()
    {
        return view('clients/reports/transactions/index');
    }

    function getAll()
    {
        $TransactionsModel = model('TransactionsModel');
        $request = $this->request->getPost(array('from', 'to'));
        if (validateDate($request['from'], 'Y-m-d') && validateDate($request['to'], 'Y-m-d')) {
            $where = array(
                'from' => $request['from'],
                'to' => $request['to']
            );
            $data['check_date'] = TRUE;
        } else {
            $where = array(
                'from' => '',
                'to' => ''
            );
            $data['check_date'] = ($request['from'] != '') ? FALSE : TRUE;
        }

        $data['data'] = $TransactionsModel->getTransactions($where);
        echo json_encode($data);
    }
}
