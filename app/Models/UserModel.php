<?php
namespace App\Models;

use Core\Database\Model;
use Core\Database\QueryBuilder;

class UserModel extends Model
{

    protected $table = 'users';
    protected $primaryId = 'id';

}
