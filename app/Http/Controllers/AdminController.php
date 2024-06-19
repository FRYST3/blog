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

    public function article_delete($id)
    {
        Articles::where('id', $id)->delete();

        return response()->json(['success' => true]);
    }

    public function article_edit($id)
    {
        $article = Articles::where('id', $id)->first();

        return view('admin.edit', compact('article'));
    }

    public function article_newpage()
    {
        return view('admin.new');
    }

    public function article_save(Request $r, $id)
    {
        if ($r->title == NULL || $r->text == NULL || $r->img == NULL || $r->desc == NULL) {
            return redirect()->back()->with('error', 'Заполните все поля');
        }

        Articles::where('id', $id)->update([
            'title' => $r->title,
            'text' => $r->text,
            'image' => $r->img,
            'description' => $r->desc
        ]);

        return redirect('/admin')->with('success', 'Успешно');
    }

    public function article_new(Request $r)
    {
        if ($r->title == NULL || $r->text == NULL || $r->img == NULL || $r->desc == NULL) {
            return redirect()->back()->with('error', 'Заполните все поля');
        }

        Articles::insert([
            'title' => $r->title,
            'text' => $r->text,
            'image' => $r->img,
            'description' => $r->desc
        ]);

        return redirect('/admin')->with('success', 'Успешно');
    }
}
