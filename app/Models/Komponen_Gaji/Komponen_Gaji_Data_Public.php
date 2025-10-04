<?php

namespace App\Models\Komponen_Gaji;

use CodeIgniter\Model;

class Komponen_Gaji_Data_Public extends Model
{
    protected $table= 'komponen_gaji';
    protected $primaryKey = 'id_komponen_gaji';
    protected $allowedFields = ['id_anggota','nama_komponen','kategori','jabatam','nominal','satuan'];
}


?>