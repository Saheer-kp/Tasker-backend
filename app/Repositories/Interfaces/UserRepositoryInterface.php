<?php

namespace App\Repositories\Interfaces;

use App\Models\User\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
}
