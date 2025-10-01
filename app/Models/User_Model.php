<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table= 'kurir';
    // protected $primaryKey = 'user_id';
    protected $allowedFields = ['nama', 'barang', 'id_harga'];
}


?>