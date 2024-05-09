<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class StoreController extends Controller
{
    public function __invoke()
    {
        $blogItem = request()->validate([
            'subject' => 'required|string',
            'description' => 'string',
        ]);
        
        $blog = Blog::create($blogItem);
        return redirect()->route('blog.index');
    }
}
