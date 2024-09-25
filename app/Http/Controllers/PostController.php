<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{

    public function __construct()
    {
        parent::__construct(PostService::class, new PostRequest);
    }
}
