<?php

namespace App\Transformers\Users;

use League\Fractal\TransformerAbstract;
use App\User;

class PublicUserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'joined' => $user->created_at->toDateTimeString(),
        ];
    }
}
