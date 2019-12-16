<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use AuthenticatesUsers;
use DB;

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = "4";
        $this->middleware('auth');
        /*if(auth()->user()->status == $user){
            return view('web.home');
        }*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::orderBy('id')->paginate(20);
        return view('cssp.staffs.index')->with('staffs',$staffs); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Department::pluck('name', 'id');
        return view('cssp.staffs.create')->with('dep',$dep);
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
            'e-mail' => 'required',
            'tel' => 'required',
            'language' => 'required',
            'position' => 'required',
            'dep' => 'required',
            
        ]);
        
        
        // Create 
        $staff = new Staff;
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->tel = $request->input('tel');
        $staff->language = $request->input('language');
        $staff->position = $request->input('position');
        $staff->dep = $request->input('dep');
        //$id = $post->id;  // get last id after insert.
        //$post->cover_image = $fileNameToStore;
        $staff->save();

        return redirect('/staffs')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        $deps = Department::where('id',$staff->dep_id)->get();
        //$dep = DB::table('department')('id','=','dep_id')->from('staff')->get();
        return view('cssp.staffs.show', compact('staff',$staff))->with('deps',$deps);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $staff = Staff::find($id);
        $dep = Department::pluck('name', 'id');
        return view('cssp.staffs.edit', compact('dep',$dep))->with('staff',$staff,'dep',$dep);
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
            'e-mail' => 'required',
            'tel' => 'required',
            'language' => 'required',
            'position' => 'required',
            'dep' => 'required',
        ]);
        
        // Create Post
        $staff = Staff::find($id);
        $staff->name = $request->input('name');
        $staff->email = $request->input('e-mail');
        $staff->tel = $request->input('tel');
        $staff->language = $request->input('language');
        $staff->position = $request->input('position');
        $staff->dep_id = $request->input('dep');
        $staff->save();
        return redirect('/staffs')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('/staffs')->with('success', 'Removed');
    }
}
