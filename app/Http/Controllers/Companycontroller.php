<?php

namespace App\Http\Controllers;

use App\Company;
use App\Agent;
use App\User;
use App\Program;
use App\Userprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::orderBy('id')->paginate(20);
        return view('cssp.companies.index',compact('companies',$companies))->with('companies',$companies); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('cssp.companies.create');
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
            'tel' => 'required',
        ]);
        
        // Create Post
        $company = new company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->tel = $request->input('tel');
        $company->address = $request->input('address');
        
        $company->save();
        return redirect('/companies')->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        //$users = User::where('id','=','company')->from('companies')->get();
        /*$agent = Agent::where('company_id','=',$id)->get();
        $program = Program::where('company_id','=',$id)->get();
        $user = Userprofile::where('company_id',$id)->get();*/
        /*$companies = DB::table('companies','agents','programs','userprofile')
                    ->join('agents','agents.company_id','=','companies.id')
                    ->join('programs','programs.company_id','=','companies.id')
                    ->join('userprofiles','userprofiles.company_id','=','companies.id')
                    //->select('companies.*','agents.*','programs.*','userprofiles.*')
                    ->where('companies.id',$id)->get();*/
        return view('cssp.companies.show',
        compact('company',$company))->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        
        return view('cssp.companies.edit',compact('company',$company));
    }
    public function editp($id)
    {
        $company = Company::find($id);
        
        return view('cssp.companies.editp',compact('company',$company));
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
            'tel' => 'required',
        ]);
        
        // Create Post
        $company = company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->tel = $request->input('tel');
        $company->address = $request->input('address');
        $id = company::find($id);
        $company->save();
        return view('cssp.companies.show',compact('company',$company))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/companies')->with('success', 'Removed');
    }
}
