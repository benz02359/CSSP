<?php

namespace App\Http\Controllers\Auth;



use App\Notifications\NewUser;

use App\User;
use App\Userprofile;
use App\Company;
use App\Staff;
use App\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
        
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'company_id' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'company' => $data['company'],
            'status' => $data['status'],    
            'approve' => $data['approve'], 
            'admin' => $data['admin'],   
            'password' => Hash::make($data['password']),
        ]);*/
        try {
            // do your database transaction here
        
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'company_id' => $data['company_id'],
            'role_id' => $data['status'],    
            'approve' => $data['approve'], 
            'admin' => $data['admin'],   
            'password' => Hash::make($data['password']),
        ]);

        if($data['status'] == 2){
            $staff = Staff::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,            
            ]);
            $staff->save();
            $user->save();
        }
        if($data['status'] == 3){
            $agent = Agent::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,  
                'company_id' => $user->company_id        
                ]);
            $agent->save();
            $user->save();  
            }

        if($data['status']== 4){
            $userp = Userprofile::create([
            'user_id'           =>      $user->id,            
            ]);
            $userp->save();
            $user->save();
        }
        if($data['status']== 1){
            $user->save();
        }
        
        $admin = User::where('admin', 1)->first();
        if ($admin) {
            
            $admin->notify(new NewUser($user));
        }
        
        return $user;
        }
        catch (\Illuminate\Database\QueryException $e) {
            // something went wrong with the transaction, rollback
        } catch (\Exception $e) {
            // something went wrong elsewhere, handle gracefully
        }
    }
    protected function registeradmin()
    {
        
        return view('auth.registeradmin');
    }
    
    protected function registerstaff()
    {
        $companies = company::all();
        return view('auth.registerstaff', compact('companies',$companies));
    }
    
    protected function registeragent()
    {
        $companies = company::all();
        return view('auth.registeragent', compact('companies',$companies));
    }
    
    protected function registeruser()
    {
        $companies = company::all();

        return view('auth.registeruser', compact('companies',$companies));
    }
    protected function registerforadmin()
    {
        return view('auth.registerforadmin');
    }
    protected function registeruserbyagent()
    {
        $companies = company::all();

        return view('auth.registeruserbyagent', compact('companies',$companies));
    }
    
    /*protected function regisadmin(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //$user->assignRole('admin');
        //auth()->user()->assignRole('admin');
        //$users = User::role('writer')->get();

        //return $user;
    }*/
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if(!Auth::guest()){
            return back()->with('success','สร้างผู้ใช้เรียบร้อย');
            //$this->guard()->login($user);
            
        }
        else {
            //return back()->with('success','สร้างผู้ใช้เรียบร้อย');
            $this->guard()->login($user);
            return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
            //return redirect('/home');
        }
    }

    
}
