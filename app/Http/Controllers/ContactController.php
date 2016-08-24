<?php

namespace LearnGP\Http\Controllers;

use LearnGP\Contact\Contact;
use LearnGP\Contact\ContactTransformer;
use LearnGP\Core\EloquentBaseModel;

use LearnGP\Http\Requests;

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
