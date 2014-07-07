<?php
namespace HugoKalidas\LaravelFlexCms\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class ExampleUserSeeder extends Seeder {

    public function run()
    {

        $types = [
            [
                'email'         => Config::get('laravel-flex-cms::setup.email'),
                'first_name'    => Config::get('laravel-flex-cms::setup.first-name'),
                'last_name'     => Config::get('laravel-flex-cms::setup.last-name'),
                'password'      => Hash::make( Config::get('laravel-flex-cms::setup.password') ),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ];
        DB::table('users')->insert($types);
        $this->command->info('User Table Seeded');

    }

}
