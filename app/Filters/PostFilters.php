<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\User;

class PostFilters extends Filters
{
    protected $filters = ['by'];

    /**
     * Filter the query by a given username.
     * @param string $username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
}
