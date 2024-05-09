<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class EditController extends Controller
{
    public function __invoke(Blog $blog)
    {
        
        return view('blog.edit', compact('blog'));
    }
}
