<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $articles = Articles::orderBy('id', 'desc')->get();

        return view('index', compact('articles'));
    }

    public function article($id) {
        $article = Articles::where('id', $id)->first();
        $comments = Comments::where('article_id', $id)->get();

        return view('article', compact('article', 'comments'));
    }
}
