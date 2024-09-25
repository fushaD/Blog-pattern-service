<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;

class CommentController extends BaseController
{
    public function __construct()
    {
        parent::__construct(CommentService::class, new CommentRequest);
    }
}
