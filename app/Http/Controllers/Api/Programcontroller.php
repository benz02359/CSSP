<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Program::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Program();
        $data->name=$request->get('name');
        $data->detail=$request->get('detail');        
        $data->maintainstatus=$request->get('maintainstatus');
        $data->solddate=$request->get('solddate');
        $data->startdate=$request->get('startdate');
        $data->enddate=$request->get('enddate');
        $data->company_id=$request->get('company_id');
        $data->save();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Program::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $data = Program::find($id);
        $data->name=$request->get('name');
        $data->detail=$request->get('detail');        
        $data->maintainstatus=$request->get('maintainstatus');
        $data->solddate=$request->get('solddate');
        $data->startdate=$request->get('startdate');
        $data->enddate=$request->get('enddate');
        $data->company_id=$request->get('company_id');
        $data->update();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Program::find($id);
        $data->delete();
        return response()->json($data);
    }
}
