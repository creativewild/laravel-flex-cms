<?php
namespace HugoKalidas\FlexCms\Seeds;
use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('HugoKalidas\FlexCms\Seeds\ExampleUserSeeder');
        $this->call('HugoKalidas\FlexCms\Seeds\ExampleSettingsSeeder');
        $this->command->info('All Tables Seeded');
    }

}
