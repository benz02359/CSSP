<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Staff;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stdata = Staff::all();
        return response()->json($stdata);
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
        $data = new Staff();
        $data->user_id=$request->get('user_id');
        $data->name=$request->get('name');
        $data->email=$request->get('email');        
        $data->pro_id=$request->get('pro_id');
        $data->tel=$request->get('tel');
        $data->language=$request->get('language');
        $data->position=$request->get('position');
        $data->dep_id=$request->get('dep_id');
        $data->image=$request->get('image');
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
        $data = Staff::find($id);
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
        $data = Staff::find($id);
        $data->user_id=$request->get('user_id');
        $data->name=$request->get('name');
        $data->email=$request->get('email');        
        $data->pro_id=$request->get('pro_id');
        $data->tel=$request->get('tel');
        $data->language=$request->get('language');
        $data->position=$request->get('position');
        $data->dep_id=$request->get('dep_id');
        $data->image=$request->get('image');
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
        $data=Staff::find($id);
        $data->delete();
        return response()->json($data);
    }
}
