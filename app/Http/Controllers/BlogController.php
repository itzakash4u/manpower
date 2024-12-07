<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    //

    function list_blogs() {
        $blogs=Blog::orderBy('id', 'desc')->paginate(10);
        return view('mpn.blog.blogs', compact('blogs'));
    }

    function submit_add_blog(Request $req) {
        $blog=new Blog;

        $blog->title=$req->title;
        $blog->slug=strtolower(str_replace(' ', '-', $req->title));
        $blog->description=$req->desp;
        $blog->excerpt=$req->excerpt;
        $blog->meta=$req->meta;

        if(!empty($req->file('bpic'))) {
            $file=$req->file('bpic');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path('media/blog/'), $filename);
            $blog->image=$filename;
        }

        $blog->save();
        Session::flash('success', 'Blog created.');
        return redirect('blogs');
    }

    function edit_blog($slug, $id) {
        $blog=Blog::find($id);
        return view('mpn.admin.edit-blog', compact('blog'));
    }

    function submit_edit_blog(Request $req) {
        $blog=Blog::find($req->blog_id);

        $blog->title=$req->title;
        $blog->slug=strtolower(str_replace(' ', '-', $req->title));
        $blog->description=$req->desp;
        $blog->excerpt=$req->excerpt;
        $blog->meta=$req->meta;

        if(!empty($req->file('bpic'))) {
            $file=$req->file('bpic');
            $filename=time().$file->getClientOriginalName();
            $file->move(base_path('media/blog/'), $filename);
            $blog->image=$filename;
        }

        $blog->save();
        Session::flash('success', 'Blog updated.');
        return redirect('blogs');
    }

    function remove_blog($id) {
        Blog::where('id', $id)->delete();
        Session::flash('danger', 'Blog deleted!');
        return redirect('blogs');
    }

    function comments() {
        $comments=Comment::orderBy('id', 'desc')->paginate(10);
        return view('mpn.blog.comments', compact('comments'));
    }

    function edit_comment(Request $req) {
        $cmt=Comment::find($req->comment_id);
        $cmt->comment_text=$req->comment;
        $cmt->save();
        Session::flash('success', 'Comment updated');
        return redirect('comments');
    }

    function remove_comment($id) {
        Comment::where('id', $id)->delete();
        Session::flash('danger', 'Comment deleted');
        return redirect('comments');
    }



}
