<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';

    function getUserBy(string $column, string $value)
    {
        return $this->where($column, $value)->first();
    }
}
