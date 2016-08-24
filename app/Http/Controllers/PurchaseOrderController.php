<?php

namespace LearnGP\Http\Controllers;

use LearnGP\Core\EloquentBaseModel;
use LearnGP\PurchaseOrder\PurchaseOrder;
use LearnGP\PurchaseOrder\PurchaseOrderTransformer;
use Illuminate\Http\Request;

use LearnGP\Http\Requests;

class PurchaseOrderController extends ApiController
{
    //
    /**
     * The Eloquent Model used for querying.
     *
     * @return EloquentBaseModel
     */
    protected function getModel()
    {
        return new PurchaseOrder();
    }

    /**
     * Transformer used to transform entities
     *
     * @return TransformerAbstract
     */
    protected function getTransformer()
    {
        return new PurchaseOrderTransformer();
    }
}
