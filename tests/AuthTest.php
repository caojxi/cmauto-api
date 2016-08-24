<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthTest extends TestCase
{
    use WithoutMiddleware;
    
    public function test_login_as_demo_user()
    {
        $this->post('/login', [
            'email' => 'user@codium.com.au',
            'password' => 'demo',
        ])->seeJsonStructure([
            'token',
            'user' => [
                'data' => [
                    'id', 'email', 'mobile', 'full_name', 'first_name', 'last_name', 'branch_id', 'deleted'
                ]
            ]
        ]);
    }
}
