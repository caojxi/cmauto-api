<?php

namespace LearnGP\HeadSetting;

use League\Fractal\TransformerAbstract;

class HeadSettingTransformer extends TransformerAbstract
{
    /**
     * @param HeadSetting $headSetting
     * @return array
     */
    public function transform(HeadSetting $headSetting)
    {
        $campaignStartDate = $headSetting->campaign_start_date ?
            $headSetting->campaign_start_date->format('d/m/Y') : null;

        $campaignEndDate = $headSetting->campaign_end_date ?
            $headSetting->campaign_end_date->format('d/m/Y') : null;

        $donationDisclosureStartDate = $headSetting->donation_disclosure_start_date ?
            $headSetting->donation_disclosure_start_date->format('d/m/Y') : null;

        $donationDisclosureEndDate = $headSetting->donation_disclosure_end_date ?
            $headSetting->donation_disclosure_end_date->format('d/m/Y') : null;

        return [
            'campaign_start_date' => $campaignStartDate,
            'campaign_end_date' => $campaignEndDate,
            'donation_disclosure_start_date' => $donationDisclosureStartDate,
            'donation_disclosure_end_date' => $donationDisclosureEndDate,
            'donation_threshold_amount' => floatval($headSetting->donation_threshold_amount),
            'stat_email' => $headSetting->stat_email,
            'email_frequency' => $headSetting->email_frequency,
        ];
    }
}
