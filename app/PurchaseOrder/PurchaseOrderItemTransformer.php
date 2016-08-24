<?php

namespace LearnGP\PurchaseOrder;

use League\Fractal\TransformerAbstract;

class PurchaseOrderItemTransformer extends TransformerAbstract
{
    public function transform(PurchaseOrderItem $purchaseOrderItem)
    {
        return [
            'id' => $purchaseOrderItem->getKey(),
            'name' => $purchaseOrderItem->name,
            'amount' => floatval($purchaseOrderItem->amount),
            'gst_percentage' => floatval($purchaseOrderItem->gst_percentage),
            'gst_amount' => floatval($purchaseOrderItem->gst_amount),
        ];
    }
}
