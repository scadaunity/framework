<?php
namespace App\Models;

use Core\Database\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryId = 'id';
}
