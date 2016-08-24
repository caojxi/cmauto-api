<?php

namespace LearnGP\PurchaseOrder;

use LearnGP\Core\EloquentBaseModel;

class PurchaseOrder extends EloquentBaseModel
{
    protected $guarded = ['id'];

    public function items()
    {
       return $this->hasMany(PurchaseOrderItem::class);
    }

    function getSearchableColumns()
    {
        return [];
    }
}
