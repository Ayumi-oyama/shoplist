<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 一覧画面
        //   id 降順でレコードセットを取得(Illuminate\Pagination\LengthAwarePaginator)
        $blogs = blog::orderByDesc('id')->paginate(25);
        return view('admin.blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function create(){
        //新規画面
        return view('admin.blogs.create');
    }

    public function store(StoreBlogRequest $request){
        //新規登録
        $blog = blog::create([
            'title'=>$request->title,
            'body' =>$request->body
        ]);
        return redirect(
            route('admin.blogs.show',['blog'=>$blog])
        )->with('messages.success','新規登録が完了した');
    }

    public function show(blog $blog){
        //詳細画面
        return view('admin.blogs.show',[
            'blog' => $blog,
        ]);
    }

    public function edit(blog $blog){
        //編集画面
        return view('admin.blogs.edit',[
            'blog'=> $blog,
        ]);
    }

    public function confirm(UpdateBlogRequest $request,blog $blog){
        //更新確認画面
        $blog->title = $request->title;
        $blog->body = $request->body;
        return view('admin.blogs.confirm',[
            'blog'=>$blog,
        ]);
    }

    public function update(UpdateBlogRequest $request,blog $blog){
        //更新
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->update();
        return redirect(
            route('admin.blogs.show',['blog' => $blog])
        )->with('messages.success','更新した');
    }

    public function destroy(blog $blog){
        //削除
        $blog->delete();
        return redirect(route('admin.blogs.index'));
    }
}
