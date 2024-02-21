<?php

namespace Database\Seeders;

use Artisan;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Artisan::call('sync:products');
    }
}
