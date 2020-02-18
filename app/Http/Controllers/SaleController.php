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
     * 
     */
    public function index()
    {
        
        //$sales = Program::orderBy('solddate','desc')->paginate(20);

        //$sale = Sale::all();
        $sales = Sale::with('program')->get()->sortByDesc('program.solddate');
        //$sales = $salesdata ->paginate(2);
        //$items = $sales->forPage(5, 5);
        //$sales = $salesdata->paginate(20);
        //$sales = Sale::all()->p()->orderBy('solddate','desc')->paginate(20);
        //$sales = Sale::with('lastprogram')->get()->sortByDesc('lastprogram.solddate');
        //$program= program::all();
        //$solddate = $program->solddate;
        //Sale::joinRelations('program');
        //$sales = Sale::orderByJoin('program.solddate','desc')->paginate(20);
        $salesdata = Sale::all();
        return view('cssp.sales.index')->with('sales',$sales,'salesdata',$salesdata); 
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
        'price' => $request['price'],
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
        'company_id' => $company->id,
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
        //return view('cssp.sales.index')->with('success', 'Created');

        return redirect('sales')->with('success', 'สร้างรายการขายเสร็จสิ้น');
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
        $company = Company::where('id','=',$sale->company_id)->first();
        $program = Program::where('id','=',$sale->pro_id)->first();

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
        return view('cssp.sales.edit',compact('sdata',$sdata));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            if(($request->input('end') < $request->input('start')) || ($request->input('start') < $request->input('sold'))){
                Session::flash('error', 'กรุณาเปลี่ยนวันที่');
                return redirect()->back()->withInput();
            } else{
                $sdata = Sale::find($id);
                $companyid = Company::where('id','=',$sdata->company_id)->first();
                $programid = Program::where('id','=',$sdata->pro_id)->first();

           
            $company = Company::find($companyid)->first();
            $company->name = $request->input('namecompany');
            $company->email = $request->input('cemail');
            $company->tel = $request->input('tel');
            $company->address = $request->input('address');
            $company->save();
            $sdata->save();

            
            $program = Program::find($programid)->first();
            $program->name = $request->input('nameprogram');
            $program->detail = $request->input('detailprogram');
            $program->price = $request->input('price');
            $program->solddate = $request->input('sold');
            $program->startdate = $request->input('start');
            $program->enddate = $request->input('end');
                
                
                $program->save();
                return redirect('/sales')->with('success', 'แก้ไขเรียบร้อยแล้ว');
            }
            
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $companyid = Company::where('id','=',$sale->company_id)->first();
        $programid = Program::where('id','=',$sale->pro_id)->first();
        $sale->delete();
        //$company->delete();
        //$program->delete();
        return redirect('/sales')->with('success', 'ลบโปรแกรมออกเรียบร้อยแล้ว');
    }
}
