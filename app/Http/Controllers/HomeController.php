<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();
        return view('user', compact('blogs'));
    }
}
