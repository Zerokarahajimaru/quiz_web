<?php

namespace App\Models\Pengguna;

use CodeIgniter\Model;

class Login_Data extends Model
{
    protected $table= 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['id_pengguna', 'username', 'password','email','role','nama_depan','nama_belakang'];
}


?>