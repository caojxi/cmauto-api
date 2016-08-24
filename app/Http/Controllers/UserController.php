<?php

namespace Cmauto\Http\Controllers;

use Cmauto\User\User;
use Cmauto\Http\Requests;
use Cmauto\User\UserTransformer;

class UserController extends ApiController
{
    /**
     * The Eloquent Model used for querying.
     *
     * @return User
     */
    protected function getModel()
    {
        return new User();
    }

    /**
     * Transformer used to transform entities
     *
     * @return UserTransformer
     */
    protected function getTransformer()
    {
        return new UserTransformer();
    }
}
