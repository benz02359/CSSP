<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Session;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $departments = Department::all();
        return view('cssp.departments.index')->with('departments',$departments); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('css.department.adddep');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255|unique:departments'));
        
        $dep = new Department;
        $dep->name = $request->name;

        $dep->save();

        Session::flash('success', 'เพิ่มแผนก');

        return redirect('/departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dep = Department::find($id);
        return view('cssp.departments.show')->with('dep',$dep);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Department::find($id);
        return view('cssp.departments.edit')->with('dep',$dep);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->validate($request, ['name' => 'required|max:255|unique:departments']);
        $dep = Department::find($id);
        $dep->name = $request->name;
        $dep->save();
        Session::flash('success', 'ทำการบันทึกแผนกใหม่เสร็จสิ้น');
        return redirect()->route('departments.index', $dep->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep = Department::find($id);
        if(count($dep->staff)>0){
            Session::flash('error', 'ไม่สามารถลบได้ เนื่องจากพบข้อมูลพนักงาน ');
        }
        else{
            $dep->delete();
        }
        
        //$dep->staff()->detach();
        
        
        return redirect()->route('departments.index');
    }
}
