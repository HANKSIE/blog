<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogImageUploadRequest;
use App\Models\Blog;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function listPage()
    {
        $Blogs = Blog::OrderBy('id', 'desc')->paginate(5);
        return view('blog.list', ['heading' => '文章列表', 'subheading' => '瀏覽文章',  'Blogs' => $Blogs]);
    }

    public function createPage()
    {
        return view('blog.editor', ['heading' => '新增', 'subheading' => '新增文章']);
    }

    public function editPage($bid)
    {
        $Blog = Blog::find($bid);
        return view('blog.editor', ['heading' => '編輯', 'subheading' => '編輯文章', 'Blog' => $Blog]);
    }

    public function viewPage($bid)
    {
        $Blog = Blog::find($bid);
        return view('blog.view', ['heading' => '', 'subheading' => '', 'Blog' => $Blog]);
    }

    public function create(BlogCreateRequest $request)
    {
        $input = $request->all();
        $input['creator_id'] = session('user')['id'];
        Blog::create($input);
        return redirect('/');
    }

    public function edit(BlogEditRequest $request)
    {
        $input = $request->all();
        $Blog = Blog::find($input['bid']);
        $Blog->title = $input['title'];
        $Blog->content = $input['content'];
        $Blog->save();
        return redirect("/blog/{$input['bid']}");
        // edit handle
    }

    public function imageUpload(BlogImageUploadRequest $request)
    {
        //有上傳圖片
        if ($request->hasFile('upload')) {
            $photo = $request->file('upload');
            //檔案副檔名
            $file_extension = $photo->getClientOriginalExtension();
            //產生自訂隨機檔案名稱
            $file_name = uniqid() . '.' . $file_extension;
            //檔案相對路徑
            $file_relative_path = 'uploads/' . $file_name;
            Image::make($photo)->save($file_relative_path);
            return response()->json(['url' => url($file_relative_path)]);
        } else {
            return response()->json(['error' => ['message' => 'uploaded fail']]);
        }
    }
}
