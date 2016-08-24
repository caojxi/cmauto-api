<?php

namespace LearnGP\HeadSetting;

use LearnGP\Core\EloquentBaseModel;

class HeadSetting extends EloquentBaseModel
{
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $dates = [
        'campaign_start_date',
        'campaign_end_date',
        'donation_disclosure_start_date',
        'donation_disclosure_end_date',
    ];

    function getSearchableColumns()
    {
        return [];
    }
}
