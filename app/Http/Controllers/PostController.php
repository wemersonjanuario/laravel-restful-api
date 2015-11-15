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
            'posts' =>  $posts
        ]);
    }
}
