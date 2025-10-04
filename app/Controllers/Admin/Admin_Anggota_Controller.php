<?php
namespace App\Controllers\Admin;


use App\Models\Penggajian\Penggajian_Data;
use App\Models\Pengguna\Login_Data;
use App\Models\Anggota\Pejabat_Admin;

use App\Controllers\BaseController;
use App\Models\Komponen_Gaji\Komponen_Gaji_Data_Admin;



class Admin_Anggota_Controller extends BaseController{

    public function admin_view_f(){
            $model_pejabat = new Pejabat_Admin(); 
            $data['pejabat'] = $model_pejabat->findAll();
            
            
            $mode_komponen_gaji = new Komponen_Gaji_Data_Admin();
            $data['komponen_gaji_pejabat'] = $mode_komponen_gaji->findAll();
            
            
        return view('admin_view',$data);
    }

    public function del_pejabat($pejabat_id){
    $model = new Pejabat_Admin();
    $model->where('id_anggota', $pejabat_id)->delete();


    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Data berhasil dihapus acuyyyyyy'
    ]);

    }


public function update_pejabat()
{
    $model = new Pejabat_Admin();
    $data = $this->request->getJSON(true);

    $id = $data['id_anggota'] ?? null;

    // pastikan id_anggota tidak ikut terupdate
    unset($data['id_anggota']);  

    if ($id && $model->update($id, $data)) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil diupdate!'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal update data'
        ])->setStatusCode(500);
    }
}




public function insert_pejabat()
{
    $model = new Pejabat_Admin();
    $data = $this->request->getJSON(true);

    // id_anggota auto increment → tidak dimasukkan
    unset($data['id_anggota']);
    // $data['id_anggota'] = 911;
    if ($model->insert($data)) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data baru berhasil ditambahkan!'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menambahkan data'
        ])->setStatusCode(500);
    }
}




// DELETE Komponen Gaji
public function delete_komponen_gaji($id = null)
{
    $model = new Komponen_Gaji_Data_Admin();

    if (!$id) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'ID komponen gaji tidak ditemukan'
        ])->setStatusCode(400);
    }

    // Pakai where agar eksplisit sesuai permintaanmu
    $deleted = $model->where('id_komponen_gaji', $id)->delete();

    if ($deleted) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menghapus data'
        ])->setStatusCode(500);
    }
}

// UPDATE
public function update_komponen_gaji()
{
    $model = new Komponen_Gaji_Data_Admin();
    $data = $this->request->getJSON(true);

    $id = $data['id_komponen'];
    unset($data['id_komponen']); // jangan overwrite id

    if ($model->update($id, $data)) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil diupdate'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal mengupdate data'
        ])->setStatusCode(500);
    }
}





public function insert_komponen_gaji()
{
    $model = new Komponen_Gaji_Data_Admin();

    $data = $this->request->getPost();
    unset($data['id_komponen_gaji']); // auto increment

    if ($model->insert($data)) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data baru berhasil ditambahkan!',
            'data' => [
                'id_komponen_gaji' => $model->getInsertID(),
                'nama_komponen'    => $data['nama_komponen'],
                'kategori'         => $data['kategori'],
                'jabatan'          => $data['jabatan'],
                'nominal'          => $data['nominal'],
                'satuan'           => $data['satuan']
            ]
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Gagal menambahkan data'
        ])->setStatusCode(500);
    }
}













}
?>