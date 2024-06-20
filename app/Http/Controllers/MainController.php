<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function review_new(Request $r) {
        if($r->id == NULL || $r->username == NULL || $r->feedback == NULL) {
            return response()->json(['error' => true, 'message' => 'Fill in all the words']);
        }

        $comment = Comments::insert([
            'article_id' => $r->id,
            'name' => $r->username,
            'review' => $r->feedback
        ]);

        return response()->json(['success' => true, 'message' => 'Success', 'name' => $r->username, 'review' => $r->feedback]);
    }

    public function blogs(Request $r)
    {
        $page = $r->page;
        $perPage = 6;
        $articles = Articles::orderBy('created_at', 'desc')->skip(($page - 1) * $perPage)->take($perPage)->get();

        $totalArticles = Articles::count();
        $totalPages = ceil($totalArticles / $perPage);

        return response()->json(['success' => true, 'data' => $articles, 'currentPage' => $page, 'totalPages' => $totalPages]);
    }
}
