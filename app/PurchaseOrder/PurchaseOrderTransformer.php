<?php

namespace LearnGP\PurchaseOrder;

use League\Fractal\TransformerAbstract;

class PurchaseOrderTransformer extends TransformerAbstract
{
    public function transform(PurchaseOrder $purchaseOrder)
    {
        return [
            'id' => $purchaseOrder->getKey(),
            'amount' => floatval($purchaseOrder->amount),
            'gst_amount' => floatval($purchaseOrder->gst_amount),
            'status' => $purchaseOrder->status,
            'is_upcoming' => boolval($purchaseOrder->is_upcoming),
        ];
    }
}
