<?php
namespace App\Controllers;


use App\Models\Login_Data;
use App\Models\Pejabat;

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


    if (password_verify($button_login['password_html'], $storedHash)) {


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
        if($role == 'public')return 1;
        else 
        if($role == 'admin') return 2;
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
                return redirect()->to(base_url('/'));
                break;
            default:
                // return view('Page_Mahasiswa_Dashboard');
                return redirect()->to(base_url('/'));
                break;
        }
    }


        public function public_user(){
            return view('Test_User');
        }



        public function data_pejabat(){
            $pejabat = new Pejabat();
            $data['pejabat'] = $pejabat->findAll();


            return view('Menampilkan',$data);
        }
}
?>