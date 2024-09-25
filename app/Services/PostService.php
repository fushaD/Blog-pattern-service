<?php

namespace App\Services;

use App\Models\Post;
use App\Services\BaseService;

class PostService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Post::class);
    }
}
