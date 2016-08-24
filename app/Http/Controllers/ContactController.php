<?php

namespace Cmauto\Http\Controllers;

use Cmauto\Contact\Contact;
use Cmauto\Contact\ContactTransformer;
use Cmauto\Core\EloquentBaseModel;

use Cmauto\Http\Requests;

class ContactController extends ApiController
{
    //
    /**
     * The Eloquent Model used for querying.
     *
     * @return EloquentBaseModel
     */
    protected function getModel()
    {
        return new Contact();
    }

    /**
     * Transformer used to transform entities
     *
     * @return TransformerAbstract
     */
    protected function getTransformer()
    {
        return new ContactTransformer();
    }
}
