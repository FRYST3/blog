<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $articles = Articles::orderBy('id', 'desc')->get();

        return view('index', compact('articles'));
    }
}
