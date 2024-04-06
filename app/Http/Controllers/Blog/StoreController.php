<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class StoreController extends Controller
{
    public function __invoke()
    {
        $postItem = request()->validate([
            'subject' => 'required|string',
            'description' => 'string',
        ]);
        
        $post = Blog::create($postItem);
        return redirect()->route('blog.index');
    }
}
