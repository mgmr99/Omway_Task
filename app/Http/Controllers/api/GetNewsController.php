<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetNewsController extends Controller
{
    
    public function index()
    {
        $news = \App\Models\News::all();
        return response()->json([
            'news' => $news
        ], 200);
    }
    
    public function insert (Request $request)
    {
        $news = new \App\Models\News();
        $news->category_id = $request->category_id;
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->date = $request->date;
        $news->description = $request->description;
        $news->image = $request->image;
        $news->is_publish = $request->is_publish;
        $news->save();
        return response()->json([
            'news' => $news
        ], 200);
    }
}
