<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Company;
use Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('id')->paginate(20);
        return view('cssp.programs.index')->with('programs',$programs); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::pluck('name', 'id');
        return view('cssp.programs.create', compact('company',$company));
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'company' => 'required',
            'sold' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);
        
        // Create Post
        $program = new Program;
        $program->name = $request->input('name');
        $program->detail = $request->input('detail');
        $program->company_id = $request->input('company');
        $program->solddate = $request->input('sold');
        $program->startdate = $request->input('start');
        $program->enddate = $request->input('end');
        //$post->cover_image = $fileNameToStore;
        
        if(($program->enddate > $program->startdate) && ($program->startdate > $program->solddate)){
            $program->save();
            return redirect('/programs')->with('success', 'Created');
        } else {
            Session::flash('error', 'กรุณาเปลี่ยนวันที่');
            return redirect()->back()->withInput();
        }
        
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        $company = Company::where('id',$program->company_id)->get();
        return view('cssp.programs.show',
        compact('company',$company, 'program',$program ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        $company = Company::pluck('name', 'id');
        return view('cssp.programs.edit',compact('program'))->with('company',$company,'program',$program);
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
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'sold' => 'required',
            'start' => 'required',
            'end' => 'required',

        ]);
        
        // Create Post
        $program = Program::find($id);
        $program->name = $request->input('name');
        $program->detail = $request->input('detail');
        $program->solddate = $request->input('sold');
        $program->startdate = $request->input('start');
        $program->enddate = $request->input('end');
        //$post->cover_image = $fileNameToStore;
        $program->save();
        return redirect('/programs')->with('success', 'Updated');
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
