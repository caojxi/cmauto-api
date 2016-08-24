<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    public function test_create_show_update_supplier()
    {
        $newContact = [
            'first_name' => 'Tim',
            'last_name' => 'Duncan',
            'email' => 'td@nba.com',
            'mobile' => '0454547874',
            'type' => 'supplier',
        ];

        $updatedContact = [
            'first_name' => 'Kevin',
            'last_name' => 'Durant',
            'email' => 'kd@nba.com',
            'mobile' => '054585478',
            'type' => 'customer',
        ];

        $this->makeCreateShowUpdateTest($newContact, '/contacts', $updatedContact);
    }
}
