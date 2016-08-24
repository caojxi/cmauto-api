<?php

namespace LearnGP\Contact;

use LearnGP\Core\EloquentBaseModel;

class Contact extends EloquentBaseModel
{
    public $timestamps = false;

    protected $guarded = ['id'];

    function getSearchableColumns()
    {
        return ['myob_id', 'first_name', 'last_name', 'email', 'mobile'];
    }
}
