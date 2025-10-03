<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;

class Get_Login_Data extends BaseController
{
    public function dashboard()
    {
        return view('Page_Login_Form');
    }
    
    
    public function public_dashboard(){
        return view('Test_User'); 
    }
}
?>