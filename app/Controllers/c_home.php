<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class c_home extends BaseController
{
    public function home()
    {
        // title
        $data['title'] = 'HOME';

        // return view
        return view('v_home', $data);
    }
}
