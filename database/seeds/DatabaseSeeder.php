<?php

use ALP\Branch\Branch;
use ALP\HeadSetting\HeadSetting;
use ALP\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'branches',
        'users',
        'head_settings',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clearTablesBeforeSeeding();

        $this->seedBranchesTable();
        $this->seedUsersTable();
        $this->seedHeadSettingsTable();
    }

    public function clearTablesBeforeSeeding()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function seedBranchesTable()
    {
        Branch::create([
           'name' => 'Head Office'
        ]);
    }

    private function seedUsersTable()
    {
        User::create([
            'email' => 'user@codium.com.au',
            'password' => bcrypt('demo'),
            'role' => 'head',
            'branch_id' => 1,
        ]);
    }

    private function seedHeadSettingsTable()
    {
        HeadSetting::create();
    }
}
