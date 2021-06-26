<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResourse;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        return PostResourse::collection(Post::paginate());        
    }

    public function store(Request $request){

        $user = Post::find($request->input('user_id'));
        $post = Post::create($request->only('name'));
        return response(new PostResourse($post), Response::HTTP_CREATED);
        
    }

    public function show($id){
        return new PostResourse(Post::find($id));
    }

    public function update(Request $request, $id){
        $post = Post::find($id);

        $post->update($post->only('name'));

        return response(new PostResourse($post), Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        Post::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
