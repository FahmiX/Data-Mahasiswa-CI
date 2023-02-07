<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class c_info extends BaseController
{
    public function info()
    {
        // title
        $data['title'] = 'INFO';

        // return view
        return view('v_informasi', $data);
    }
}
