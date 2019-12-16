<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Agent;
use App\Program;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('created_at','desc')->paginate(20);
        return view('cssp.sales.index')->with('sales',$sales); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cssp.sales.create');
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
            'namecompany' => 'required',
            'tel' => 'required',
            'nameprogram' => 'required',
            //'detailprogram' => 'required',            
            'sold' => 'required',
            'start' => 'required',
            'end' => 'required',
            //'detail' => 'required',

            /*'name' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],*/
        ]);
        try {
            // do your database transaction here
        
        //$company = new company;
        $company = Company::create([
        'name' => $request['namecompany'],
        'email' => $request['cemail'],
        'tel' => $request['tel'],
        'address' => $request['address'],
      
        ]);
    
        $program = Program::create([
        'name' => $request['nameprogram'],
        'detail' => $request['detailprogram'],
        'company_id' => $company->id,
        'solddate' => $request['sold'],
        'startdate' => $request['start'],
        'enddate' => $request['end'],
        ]);

        $sale = Sale::create([
        'company_id' => $company->id,
        'pro_id' => $program->id,
        //'detail' => $request['detail'],
        ]); 

        if(($program->enddate < $program->startdate) || ($program->startdate < $program->solddate)){
            Session::flash('error', 'กรุณาเปลี่ยนวันที่');
            return redirect()->back()->withInput();
        } else {
            
        
        
        if($request['name'] == ""){
        $company->save();
        $program->save();
        $sale->save();
        } else {
        $user = User::create([
        'name' => $request['name'],
        'username' => $request['username'],
        'email' => $request['email'],
        'company' => $company->id,
        'role_id' => $request['status'],    
        'approve' => $request['approve'], 
        'admin' => $request['admin'],   
        'password' => Hash::make($request['password']),
        ]);

        $agent = Agent::create([
        'user_id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,  
        'company_id' => $company->id,           
        ]);

        
        
    
        $company->save();
        $program->save();
        $user->save();
        $agent->save();
        $sale->save();

        }
        }
        return redirect('/sales')->with('success', 'Created');
        }
        catch (\Illuminate\Database\QueryException $e) {
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        $company = Company::where('id','=',$sale->company_id)->get();
        $program = Program::where('id','=',$sale->pro_id)->get();

        return view('cssp.sales.show',
        compact('company',$company, 'sale',$sale , 'program',$program ))->with('company',$company, 'sale',$sale , 'program',$program);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sdata = Sale::find($id);
        return view('css.sale.editsale',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
