<?php

namespace Cmauto\Client;

use Cmauto\Core\EloquentBaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends EloquentBaseModel
{
    public $timestamps = false;

    use SoftDeletes;

    function getSearchableColumns()
    {
        return ['name', 'email'];
    }
}
