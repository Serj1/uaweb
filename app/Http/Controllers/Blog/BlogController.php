<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = Blog::all();

        return view('admin.blog.list', ['items' => $results]);
    }


    public function create()
    {
        return view('admin.blog.form');
    }

    public function edit($id)
    {
        $item = Blog::find($id);

        if (!$item) {
            exit('Blog not found');
        }

        return view('admin.blog.form', ['item' => $item]);
    }

    /**
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Blog::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'description' => $request->input('description'),
            'author' => Auth::user()->id
        ]);

        $user->save();

        return redirect('admin/blog');
    }

    public function update(Request $request)
    {
        $item = Blog::find($request->input('id'));

        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->body = $request->input('body');
        $item->save();

        return redirect('admin/blog');
    }

    public function destroy($id)
    {
        $item = Blog::find($id);
        $item->delete();

        return redirect('admin/blog');
    }

    public function upload(Request $request){

        $file = $request->file('filefield');

        $extension = $file->getClientOriginalExtension();

        Storage::disk('local')->put($file->getFilename().'.'.$extension, File::get($file));

        $file = [
            'mime' => $file->getClientMimeType(),
            'original_filename' => $file->getClientOriginalName(),
            'filename' => $file->getFilename().'.'.$extension
        ];

    }


}