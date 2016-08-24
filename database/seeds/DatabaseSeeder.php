<?php

use Cmauto\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clearTablesBeforeSeeding();

        $this->seedUsers();
    }

    public function clearTablesBeforeSeeding()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function seedUsers()
    {
        User::create([
            'email' => 'caojxi@gmail.com',
            'password' => 'password',
        ]);
    }
}
