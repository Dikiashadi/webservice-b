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

    public function destroy(Blog $id)
    {
        $id->delete();
        return redirect(url('data-blog'));
    }
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('blog/edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = Blog::find($id);
        $blogValid = [
            'author' => 'required|min:3',
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'keyword' => 'required|min:5'
        ];

        if ($request->id != $data->id) {
            $blogValid['id'] = 'required|unique:blog|max:10';
        }
        $validatedData = $request->validate($blogValid);
        $data->update($request->all());
        return redirect(url('data-blog'));
    }

}
