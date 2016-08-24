<?php

namespace LearnGP\PurchaseOrder;

use LearnGP\Core\EloquentBaseModel;

class PurchaseOrderItem extends EloquentBaseModel
{
    public $timestamps = false;
    
    public function order()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    function getSearchableColumns()
    {
        return [];
    }
}
