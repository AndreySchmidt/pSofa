<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class DeleteController extends Controller
{
    public function __invoke()
    {
        $blogList = Blog::paginate(2);
        // dd($blogList);

        return view('blog.index', compact('blogList'));
    }
}
