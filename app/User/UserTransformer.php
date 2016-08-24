<?php

namespace Cmauto\User;

use Cmauto\Branch\BranchTransformer;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
    ];

    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->getKey(),
            'email' => $user->email,
            'role' => $user->role,
            'name' => $user->name,
        ];
    }
}
