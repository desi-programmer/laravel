<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdeasModel;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        return IdeasModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        // Static Create Products
        // return IdeasModel::create([
        //     'title' => "test Title",
        //     'description' => "Test Description",
        // ]);

        // accept all 
        // return IdeasModel::create($request->all());
        
        // with validation
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        return IdeasModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $idea = IdeasModel::find($id);

        $idea->update($request->all());

        return $idea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        return IdeasModel::destroy($id);
    }
}
