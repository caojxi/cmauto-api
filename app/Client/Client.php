<?php

namespace Cmauto\Client;

use Cmauto\Core\EloquentBaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cmauto\Car\Car;

class Client extends EloquentBaseModel
{
    public $timestamps = false;

    use SoftDeletes;

    public function cars()
    {
      return $this->hasMany(Car::class);
    }

    public function services()
    {
    }

    function getSearchableColumns()
    {
        return ['name', 'email'];
    }
}
