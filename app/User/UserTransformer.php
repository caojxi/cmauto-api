<?php

namespace LearnGP\User;

use LearnGP\Branch\BranchTransformer;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
      'branch',
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
            'mobile' => $user->mobile,
            'role' => $user->role,
            'full_name' => trim("{$user->first_name} {$user->last_name}"),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'branch_id' => intval($user->branch_id),
            'deleted' => !is_null($user->deleted_at),
        ];
    }

    public function includeBranch(User $user)
    {
        if ($user->branch) {
            return $this->item($user->branch, new BranchTransformer());
        }

        return null;
    }
}
