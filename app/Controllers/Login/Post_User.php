<?php
namespace App\Controllers\Login;


use App\Models\Penggajian\Penggajian_Data;
use App\Models\Pengguna\Login_Data;
use App\Models\Anggota\Pejabat_Public;

use App\Controllers\BaseController;
use App\Models\Komponen_Gaji\Komponen_Gaji_Data_Public;

class Post_User extends BaseController{

        public function save_data()
    {   $button_login =[
        'username_html' =>  $this->request->getPost("user"),
        'password_html' =>  $this->request->getPost("password")
    ];
    // echo $button_login['username_html'];
    // echo $button_login['password_html'];
        return $button_login;
    }

public function compare()
{   
$data = new Login_Data();
$button_login = $this->save_data();


$form = $data->select('id_pengguna,email,password,role')
             ->where('email', $button_login['username_html'])
             ->first();

if ($form) {

    $storedHash = $form['password'];

    if (password_verify(     $button_login['password_html'] , $storedHash)) {


        $session = session();
        $session->set([
            'user_id'   => $form['id_pengguna'],
            'email'     => $form['email'],
            'role'      => $form['role'],
            'logged_in' => true
        ]);

        // role cuy
        return $this->get_page_based_role($this->return_status_role($form['role']));

    } else {
        
        return redirect()->to(base_url('/'))->with('error', 'Password salah');
    }

} else {

    return redirect()->to(base_url('/'))->with('error', 'Email tidak ditemukan');
}
 
}


    public function return_status_role($role){
        if($role == 'Public')return 1;
        else 
        if($role == 'Admin') return 2;
        else return 0;//nanti aku mau ngecrashin kalo unautorize :)
    }

    public function get_page_based_role($role_status_return){
        switch ($role_status_return) {
            case 1:
                // return view('Page_Mahasiswa_Dashboard');
                return redirect()->to(base_url('public'));
                break;
            case 2:
                // return view('Page_Admin_Dashboard');
                return redirect()->to(base_url('admin'));
                break;
            default:
                // return view('Page_Mahasiswa_Dashboard');
                return redirect()->to(base_url('/'));
                break;
        }
    }




        public function public_user(){
            $pejabat = new Pejabat_Public(); 
            $data['pejabat'] = $pejabat->findAll();
           
            
            $model_komponen_gaji = new Komponen_Gaji_Data_Public();
            $data['komponen_gaji_pejabat'] = $model_komponen_gaji->findAll();
            
            $model_gaji = new Penggajian_Data();
            $data['penggajian']=
            $model_gaji->select('a.nama_depan,a.nama_belakang, a.gelar_depan, a.gelar_belakang, a.jabatan,kp.nama_komponen, kp.kategori, kp.nominal, kp.satuan')
            ->from('penggajian p')
            ->join('komponen_gaji kp', 'kp.id_komponen_gaji = p.id_komponen_gaji','left')
            ->join('anggota a', 'a.id_anggota = p.id_anggota','left')
            ->distinct()
            ->findAll();
            
            
            return view('Menampilkan',$data);
        }
}
?>