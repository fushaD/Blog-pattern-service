<?php

namespace App\Services;

use App\Models\Comment;
use App\Services\BaseService;

class CommentService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Comment::class);
    }
}
