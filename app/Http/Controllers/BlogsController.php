<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\BlogsRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $blogs = Blog::where('status',0)->latest()->get();

        return view('admin.blogs.index',compact('blogs'));
        //
    }


    public function create()
    {
        $categories = Category::pluck('name','id');
        $blog = Blog::pluck('photo_id','id');
        return view('admin.blogs.create',compact('categories','blog'));
        //
    }


    public function store(BlogsRequest $request)
    {
        $inputs = $request->all();
        $user = Auth::user();
        $inputs['slug'] = Str::slug($request->title);
        $inputs['meta_title'] = $request->title;

        if ($file = $request->file('photo_id')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name,'title'=>$name]);
            $inputs['photo_id'] = $photo->id;
        }

        $blog = $user->blog()->create($inputs);

            Mail::send('emails.newBlog',['blog'=>$blog,'user'=>$user],function ($message)use($user){
                $message->to($user->email)->from('mousashawa1@gmail.com','LaraBlog')->subject('New Blog has been Success Created');
//                dd($user->email);
            });


        if ($categoryId = $request->category_id){
            $blog->category()->sync($categoryId);
        }
        Alert::success('Successful Create', 'Your Created Blog Successfully Now !');
       return redirect('/admin/blogs');

        //
    }


    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        return view('admin.blogs.show',compact('blog'));
        //
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::pluck('name','id');
        return view('admin.blogs.edit',['blog'=>$blog,'categories'=>$categories]);
        //
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $blog = Blog::findOrFail($id);

        if ($file = $request->file('photo_id')){
            if (file_exists('/images/'.$blog->photo->file)){
                unlink('/images/'.$blog->photo->file);
                $blog->photo()->delete();
            }
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name,'title'=>$name]);
            $inputs['photo_id']=$photo->id;
        }

        if ($categoryId = $request->category_id){
            $blog->category()->sync($categoryId);
        }

        if ($request->status == 1 ||$request->status == 0){
            $blog = Blog::findOrFail($id)->update($request->all());
            Alert::success('Successful Updated', 'Your Updated Draft Blog Successfully Now !');
            return redirect()->back();
        }
        $blog->update($inputs);
        Alert::success('Successful Updated', 'Your Updated Blog Successfully Now !');
        return redirect('admin/blogs');
    }


    public function destroy(Request $request , $id)
    {
        $blog = Blog::findOrFail($id);
        $categoryId = $request->category_id;
        $blog->category()->detach($categoryId);
        if (file_exists('/images/'.$blog->photo->file)) {
            if ($blog->photo_id) {
                unlink('images/' . $blog->photo->file);
                $blog->photo()->delete();
            }
        }
        $blog->delete();
        Alert::warning('Successful Updated', 'Your Updated Blog Successfully Now !');
        return redirect('/admin/blogs');
        //
    }

    public function trash(){
        $blog_trash = Blog::onlyTrashed()->get();
        return view('admin.blogs.trash',compact('blog_trash'));
    }

    public function restore($id){
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore($blog);

        return redirect('admin/blogs');
    }


    public function control()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.controlblog',compact('blogs'));
        //
    }

    public function SearchBlogs(Request $request){
        $keyword = $request->get('keyword');
        $blogs = Blog::where('title','like','%'.$keyword.'%')->limit(4)->get();
//        $blogs = Blog::where('title','like','%'.$keyword.'%')
//                    ->orWhere('body','like','%'.$keyword.'%')->limit(4)->get();
        return response()->json($blogs);
    }


}
