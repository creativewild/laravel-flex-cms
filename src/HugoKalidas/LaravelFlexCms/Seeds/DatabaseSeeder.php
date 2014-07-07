<?php
namespace HugoKalidas\LaravelFlexCms\Seeds;
use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('HugoKalidas\LaravelFlexCms\Seeds\ExampleUserSeeder');
        $this->call('HugoKalidas\LaravelFlexCms\Seeds\ExampleSettingsSeeder');
        $this->command->info('All Tables Seeded');
    }

}
