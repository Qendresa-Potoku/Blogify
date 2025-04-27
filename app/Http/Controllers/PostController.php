<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $postData=$request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $postData['title']=strip_tags($postData['title']);
        $postData['content']=strip_tags($postData['content']);
        $postData['user_id']=auth()->id();
        Post::create($postData);

        return redirect('/my-posts')->with('success', 'Post created successfully!');
        
    }
    public function showEditPost(Post $post)   {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post',['post'=>$post]);
        
    }
    public function editPost(Post $post,Request $request)  {
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        $editPostData=$request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $editPostData['title']=strip_tags($editPostData['title']);
        $editPostData['content']=strip_tags($editPostData['content']);
        $post->update($editPostData);
        return redirect('/my-posts');
    }
    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/my-posts')->with('success', 'Post deleted successfully!');
    }
}
