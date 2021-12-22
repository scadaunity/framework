<?php
namespace App\Models;

use ScadaUnity\Framework\Database\Model;
use ScadaUnity\Framework\Database\QueryBuilder;

class UserModel extends Model
{

    protected $table = 'users';
    protected $primaryId = 'id';

}
