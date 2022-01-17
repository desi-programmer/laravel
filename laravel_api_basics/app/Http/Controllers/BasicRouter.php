<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicRouter extends Controller
{
    //

    public function index(Request $request){
        $data = [
            'message' => "Index Route"
        ];
        return $data;
    }

    public function create(Request $request){
        $data = [
            'message' => "Create POST Route"
        ];
        return $data;
    }
}
