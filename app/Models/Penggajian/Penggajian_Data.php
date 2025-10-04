<?php

namespace App\Models\Penggajian;

use CodeIgniter\Model;

class Penggajian_Data extends Model
{
    protected $table= 'penggajian';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['id_komponen_gaji','id_anggota'];
}


?>