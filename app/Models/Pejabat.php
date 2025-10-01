<?php

namespace App\Models;

use CodeIgniter\Model;

class Pejabat extends Model
{
    protected $table= 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = ['id_anggota', 'nama_depan', 'nama_belakang','gelar_depan','gelar_belakang','jabatan','status_pernikahan'];
}


?>