<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 6/07/16
 * Time: 3:55 PM
 */

namespace LearnGP\BudgetCategory;

use League\Fractal\TransformerAbstract;

class BudgetCategoryTransformer extends TransformerAbstract
{
    public function transform(BudgetCategory $budgetCategory)
    {
        return [
            'id' => $budgetCategory->getKey(),
            'name' => $budgetCategory->name,
            'cap_amount' => floatval($budgetCategory->cap_amount),
        ];
    }
}
