<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();
        $posts = Post::select(['id', 'title', 'full_text'])
            ->latest()
            ->where('title->' . $locale, '!=', '')
            ->take(10)
            ->get();
        return view('home', compact('posts'));
    }
}
