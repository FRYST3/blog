<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $r)
    {
        $username = $r->username;
        $password = $r->password;

        $admin = Admins::where([['username', $username], ['password', $password]])->first();

        if (!$admin) {
            return redirect()->back();
        }

        Auth::guard('admins')->login($admin, true);

        return redirect('/admin');
    }

    public function index()
    {
        $articles = Articles::orderBy('id', 'desc')->get();

        return view('admin.index', compact('articles'));
    }
}
