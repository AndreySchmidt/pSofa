<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('blog.create');
    }
}
