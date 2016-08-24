<?php

namespace Cmauto\Http\Controllers;

use Cmauto\Client\Client;
use Cmauto\Client\ClientTransformer;
use Cmauto\Core\EloquentBaseModel;
use Illuminate\Http\Request;

use Cmauto\Http\Requests;
use League\Fractal\TransformerAbstract;

class ClientController extends ApiController
{
    /**
     * The Eloquent Model used for querying.
     *
     * @return EloquentBaseModel
     */
    protected function getModel()
    {
        return new Client();
    }

    /**
     * Transformer used to transform entities
     *
     * @return TransformerAbstract
     */
    protected function getTransformer()
    {
        return new ClientTransformer();
    }
}
