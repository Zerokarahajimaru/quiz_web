<?php

namespace App\Models\Komponen_Gaji;

use CodeIgniter\Model;

class Komponen_Gaji_Data_Admin extends Model
{
    protected $table= 'komponen_gaji';
    protected $primaryKey = 'id_komponen_gaji';
    protected $allowedFields = ['id_komponen_gaji','nama_komponen','kategori','jabatan','nominal','satuan'];
}


?>