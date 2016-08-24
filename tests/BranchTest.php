<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BranchTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    public function test_create_show_update_branch()
    {
        $newBranch = [
            'name' => 'Adelaide Branch',
            'myob_job_no' => '999',
            'income_no' => '111',
            'spending_cap' => 989898,
        ];

        $updatedBranch = [
            'name' => 'Kent Town Branch',
            'myob_job_no' => '878',
            'income_no' => '7676',
            'spending_cap' => 7567.32,
        ];

        $this->makeCreateShowUpdateTest($newBranch, '/branch', $updatedBranch);
    }
}
