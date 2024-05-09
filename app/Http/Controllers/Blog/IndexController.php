<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\IndexRequest;
use Illuminate\Http\Request;
use App\Models\Blog;

class IndexController extends Controller
{
    // public function __invoke(IndexRequest $request)
    // {
    //     $data = $request->validated();
    //     $blogQB = Blog::query();

    //     if(!empty($data['subject']))
    //     {
    //         $blogList = $blogQB->where('subject', 'like', "%".$data['subject']."%");
    //     }

    //     $blogList = $blogQB->orderBy('id', 'DESC')->paginate(4)->withQueryString();

    //     // dd($request->only('subject'));
    //     // if(!empty($request->only('subject')))
    //     // {
    //     //     $blogList = Blog::query()->where('subject', 'like', "%".$request->only('subject')['subject']."%")->orderBy('id', 'DESC')->paginate(4)->withQueryString();
    //     // }
    //     // else
    //     // {
    //     //     $blogList = Blog::query()->orderBy('id', 'DESC')->paginate(4);
    //     // }
    //     // dd($blogList);

    //     return view('blog.index', compact('blogList'));
    // }

    public function __invoke(Request $request)
    {
        // dd($request->only('subject'));
        if(!empty($request->only('subject')))
        {
            $blogList = Blog::query()->where('subject', 'like', "%".$request->only('subject')['subject']."%")->orderBy('id', 'DESC')->paginate(4)->withQueryString();
        }
        else
        {
            $blogList = Blog::query()->orderBy('id', 'DESC')->paginate(4);
        }
        // dd($blogList);

        return view('blog.index', compact('blogList'));
    }
}
