<?php

namespace LearnGP\BudgetCategory;

use LearnGP\Core\EloquentBaseModel;

class BudgetCategory extends EloquentBaseModel
{
    public $timestamps = false;

    protected $guarded = ['id'];

    function getSearchableColumns()
    {
        return ['name'];
    }
}
