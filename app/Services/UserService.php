<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
