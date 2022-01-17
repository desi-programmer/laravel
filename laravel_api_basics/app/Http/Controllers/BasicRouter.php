<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LoggerMiddleWare;

class BasicRouter extends Controller
{
    //

    public function __construct(){
        $this->middleware('logs');
    }

    public function index(Request $request, $id){
        // $data = [
        //     // all queries
        //     'queries' => $request->query(),
        //     'id' => $request['id'],
        //     'parameter' => $id,
        //     'comments' => $request['comments'], // will be null
        // ];

        // using helper function 
        // just extended
        $data  = [
            'queries' => request()->query('id'),
            'params' => request()->route()->parameters()['id'],
        ];

        return $data;
    }

    public function create(Request $request){
        $data = [
            'message' => "Create POST Route"
        ];
        return $data;
    }

    public function params(Request $request){
        $data = [
            'username' => $request['username'],
        ];
        return $data;
    }
}
