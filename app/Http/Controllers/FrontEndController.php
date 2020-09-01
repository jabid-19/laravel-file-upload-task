<?php

namespace App\Http\Controllers;

use App\Post;
use App\Forum;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $posts = Post::latest()->paginate(8);
        return view('welcome',compact('posts'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSinglePost(Post $post) {
        $post->load('comments');
        return view('single-post',compact('post'));
    }

    public function getAllForum() {
        $forums = Forum::latest()->paginate(8);
        return view('forum',compact('forums'));
    }

    public function getSingleForum(Forum $forum) {
        $forum->load('comments');
        return view('single-forum',compact('forum'));
    }
}
