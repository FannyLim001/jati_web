<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function signup()
    {
        return view('auth.registrasi');
    }

    function prosesLogin(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('user')->attempt($credentials)) {
            //dd(Auth::guard('user')->check());
            $role = Auth::guard('user')->user()->role;
            if ($role === 'Penulis') {
                // User is an author
                return redirect()->intended('user_jurnal');
            } elseif ($role === 'Reviewer') {
                // User is a reviewer
                return redirect()->intended('reviewer_jurnal');
            } elseif ($role === 'Editor') {
                // User is an editor
                return redirect()->intended('editor_jurnal');
            }
        } else if (Auth::guard('admin')->attempt($credentials)){
            //dd(Auth::guard('admin')->check());
            return redirect()->intended('admin_dashboard');
        }

        return redirect(route('login'))->with("error","data login tidak valid, silahkan coba kembali");
    }

    function registrasi(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('signup'))->withErrors($validator)->withInput();
        }

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try{
            DB::table('users')->insert([
                'username' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'created_at'=> now()
            ]);

            return redirect()->intended('login');

        } catch(\Exception $e){
            return redirect(route('signup'))->with("error","registrasi gagal, ada yang salah!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
