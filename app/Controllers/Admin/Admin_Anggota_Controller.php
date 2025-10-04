<?php
namespace App\Controllers\Admin;


use App\Models\Penggajian\Penggajian_Data;
use App\Models\Pengguna\Login_Data;
use App\Models\Anggota\Pejabat_Admin;

use App\Controllers\BaseController;
use App\Models\Komponen_Gaji\Komponen_Gaji_Data_Public;


class Admin_Anggota_Controller extends BaseController{

    public function admin_view_f(){
            $model_pejabat = new Pejabat_Admin(); 
            $data['pejabat'] = $model_pejabat->findAll();

            
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



}
?>