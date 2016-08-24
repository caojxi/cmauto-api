<?php

namespace Cmauto\Http\Controllers;

use Cmauto\Core\EloquentBaseModel;
use Cmauto\PurchaseOrder\PurchaseOrder;
use Cmauto\PurchaseOrder\PurchaseOrderTransformer;
use Illuminate\Http\Request;

use Cmauto\Http\Requests;

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
