<?php

namespace App\Controllers;

class Get_Login_Data extends BaseController
{
    public function dashboard(): string
    {
        return view('Page_Login_Form');
    }
}



?>