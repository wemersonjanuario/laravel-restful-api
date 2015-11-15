<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;

class CommentController extends BaseController
{
    public function __construct(Request $request, Comment $model){
        $this->_model = $model;
        parent::__construct($request);
    }
}
