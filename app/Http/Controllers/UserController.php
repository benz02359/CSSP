<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Auth;
use App\Notifications\PasswordReset;

class UserController extends Controller
{
    public function index()
    {   
        $usercom = auth()->user();
        $users = User::whereNull('approve')->get(); 
        //$userapp = $users->company == auth()->user()->company;
        return view('cssp.users', compact('users',$users,'usercom',$usercom))->with('users',$users,'usercom',$usercom);
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);
        $user->update(['approve' => 1]);

        return redirect()->route('admin.users.index')->withMessage('อนุมัติเรียบร้อย');
    }
    public function dimiss($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('admin.users.index')->withMessage('ปฎิเสธเรียบร้อย');
    }
        /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
    $this->notify(new PasswordReset($token));
    }
}
