<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function index()
    {
        return view('admin.home', [
            'title' => 'Trang Quản Trị Admin',
        ]);
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('admin/users/login');
    }
}
