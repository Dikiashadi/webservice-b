<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $data = Blog::all();
        return view('blog/index',compact('data'));
    }

    public function create(){
        return view('blog/add');
    }

    public function ambilData(Request $request){
        $data = Blog::create($request->all());
        return redirect('data-blog');
    }
}
