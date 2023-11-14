<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class IndexController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function __construct()
    {
        $this->layout = (check_device('mobile'))?"mobile.":'';
    }

    public function index(Request $request) {
        try {
           
           
            echo "working";
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }


}

