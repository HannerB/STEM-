<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $news = News::where('state', 1)->paginate(4);
        return view('home.home', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug) {
       
        $news = News::where('slug', $slug)->where('state', 1)->firstOrFail();
        return view('home.newsshow', compact('news'));
    }

    public function news() {
        $news = News::where('state', 1)->paginate(4);
        return view('home.news.news', compact('news'));
    }
}
