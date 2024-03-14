<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class IndexController extends Controller
{
    public function __invoke()
    {
        $blogList = Blog::paginate(2);

        return view('blog.index', compact('blogList'));
    }
}
