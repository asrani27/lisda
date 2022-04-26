<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password], true)) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/superadmin');
            } elseif (Auth::user()->hasRole('pengadu')) {
                return redirect('/pengadu');
            } elseif (Auth::user()->hasRole('pengawas')) {
                return redirect('/pengawas');
            } elseif (Auth::user()->hasRole('penyidik')) {
                return redirect('/penyidik');
            }
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            $req->flash();
            return back();
        }
    }
}
