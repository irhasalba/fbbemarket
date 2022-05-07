<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('backend.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('backend.posts.create');
    }

    public function save(StorePostRequest $request)
    {
        $request->validated();
        $image_file = $request->file('image');

        $name_file = $image_file->getClientOriginalName();
        if ($image_file->isValid()) {

            Posts::create([
                'title' => $request->title,
                'description' => $request->description,
                'images_path' => $image_file ? $image_file->storeAs('thumbnail', $name_file) : null,
                'slug' => Str::snake($request->title, '-'),
                'meta_tag' => $request->meta_tag
            ]);

            return redirect()->route('admin.posts')->with('message', 'Data berhasil ditambahkan !');
        } else {
            return redirect()->route('admin.posts')->with('message', 'Data gagal ditambahkan !');
        }
    }

    public function edit(Posts $posts)
    {
        return view('backend.posts.edit', ['posts' => $posts]);
    }

    public function update(StorePostRequest $request)
    {
        $request->validated();
        $data_posts = Posts::findOrfail($request->id)->first();

        if (!empty(@$request->images)) {
            $image_file = $request->file('image');
            $name_file = $image_file->getClientOriginalName();
            $data_posts->images_path = $image_file->storeAs('thumbnail', $name_file);
        } else {
            $data_posts->images_path = $data_posts->images_path;
        }

        $data_posts->title = $request->title;
        $data_posts->description = $request->description;
        $data_posts->slug = Str::snake($request->title, '-');
        $data_posts->meta_tag = $request->meta_tag;
        $data_posts->save();
        return redirect()->route('admin.posts')->with('messages', 'Data berhasil diubah !');
    }

    public function destroy(Request $request)
    {
        $data_posts = Posts::findOrfail($request->id)->first();
        $data_posts->destroy();
        return redirect()->route('admin.posts')->with('messages', 'Data berhasil dihapus !');
    }
}
