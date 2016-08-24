<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HeadSettingTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_update_and_show_head_settings()
    {
        $settings = [
            "campaign_start_date" => '2016-10-10',
            "campaign_end_date" => '2016-12-12',
            "donation_disclosure_start_date" => '2016-09-09',
            "donation_disclosure_end_date" => '2016-10-10',
            "donation_threshold_amount" => 565689.12,
            "stat_email" => 'nick@codium.com.au',
            "email_frequency" => '5'
        ];

        $displayedSettings = [
            "campaign_start_date" => '10/10/2016',
            "campaign_end_date" => '12/12/2016',
            "donation_disclosure_start_date" => '09/09/2016',
            "donation_disclosure_end_date" => '10/10/2016',
            "donation_threshold_amount" => 565689.12,
            "stat_email" => 'nick@codium.com.au',
            "email_frequency" => '5'
        ];

        $this->post('head/settings', $settings)->seeJson($displayedSettings);

        $this->get('head/settings')->seeJson($displayedSettings);
    }
}
