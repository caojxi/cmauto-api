<?php

namespace LearnGP\Http\Controllers;

use LearnGP\User\User;
use LearnGP\Http\Requests;
use LearnGP\User\UserTransformer;

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
