<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('backend.posts.index', ['posts' => $posts]);
    }

    public function show(Posts $posts)
    {
    }



    public function create()
    {
        return view('backend.posts.create');
    }

    public function save(StorePostRequest $request)
    {
        $request->validated();
        $folder_name = storage_path('app') . '/' . env('MAIN_UPLOADED_PATH');
        $image_file = $request->file('image');
        $file_path = file_exists($folder_name) ? $folder_name : mkdir($folder_name);
        if ($image_file->isValid()) {

            $image_file->storeAs($file_path, 'namefile');
            Posts::create([
                ''
            ]);
        }
    }

    public function edit()
    {
    }

    public function update(Request $request)
    {
        # code...
    }

    public function destroy(Request $request)
    {
    }
}
