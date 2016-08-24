<?php

namespace Cmauto\Client;

use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    public function transform(Client $client)
    {
        return [
            'id' => $client->id(),
            'name' => $client->name,
            'email' => $client->email,
        ];
    }
}
