<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function find($id)
    {
        $post = Post::find($id);
        if($post){
            return response()->json($post, 200);
        }
        return response()->json(["data not found"], 404);
    }

    public function create(Request $req)
    {
        $post = new Post;
        $post->content = $req->content;
        $post->image = $req->image;
        $post->date = date("Y-m-d");
        $post->id_user = $req->id_user;
        $post->save();
        return response()->json(["saved succesfully"], 200);
    }

    public function update(Request $req, $id)
    {
        $post = Post::find($id);
        if($post){
            $post->content = $req->content;
            $post->image = $req->image;
            $post->date = date("Y-m-d");
            $post->save();
            return response()->json(["updated succesfully"], 200);
        }
        return response()->json(["data not found"], 404);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if($post){
            $post->delete();
            return response()->json(["deleted succesfully"], 200);
        }
        return response()->json(["post not found"], 404);
    }
    
}
?>