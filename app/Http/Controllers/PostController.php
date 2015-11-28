<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;

class PostController extends BaseController
{
    public function __construct(Request $request, Post $model)
    {
        $this->_model = $model;
        parent::__construct($request);
    }


    public function getPostWithComment()
    {

        $posts = Post::with('comments.user')->get();
        return response()->json([
            'success' => true,
            'data' =>  $posts
        ]);
    }
    public function getPostWithComment2($id)
    {

        $posts = Post::where('post_id', $id)->with('comments.user')->first();
        return response()->json([
            'success' => true,
            'data' =>  $posts
        ]);
    }


}
