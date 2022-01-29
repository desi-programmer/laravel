<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IdeasModal;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        return IdeasModal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // static Values
        // return IdeasModal::create([
        //     'title' => "Test Title",
        //     "description" => "Test Description"
        // ]);

        // pass all values
        // return IdeasModal::create($request->all());
        
        // pass by keys
        // return IdeasModal::create([
        //     'title' => $request->all()['title'],
        //     "description" => $request->all()['description']
        // ]);

        // validating the request 
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        return IdeasModal::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $idea = IdeasModal::find($id);

        if(is_null($idea)){
            $data = [
                "msg" => "Enter a valid ID"
            ];
            return response( $data, 400);
        }

        $idea->update($request->all());

        return $idea;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return IdeasModal::destroy($id);
    }
}
