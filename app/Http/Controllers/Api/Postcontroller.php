<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Solution;
use App\Post;
use App\Forums;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postdata = Post::all();
        return response()->json($postdata);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function view($id)
    {
        $solutiondata = Post::find($id);
        return response()->json($solutiondata);
    }*/
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
        $data = new Post();
        $data->user_id=$request->get('user_id');
        $data->title=$request->get('title');
        $data->text=$request->get('text');        
        $data->pro_id=$request->get('pro_id');
        $data->status=$request->get('status');
        $data->view=$request->get('view');
        $data->save();
        return response()->json($data);
        //return redirect()->route('forums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postdata = Post::find($id);
        return response()->json($postdata);
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
        $potstdata = Post::find($id);
        $postdata->title=$request->get('title');
        $postdata->text=$request->get('text');
        $postdata->update();
        return response()->json($postdata);
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
    }
}
