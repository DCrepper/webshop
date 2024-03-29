<?php

namespace Database\Seeders;

use App\Jobs\SyncProducts;
use Artisan;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SyncProducts::dispatch();
        Artisan::call('queue:work --stop-when-empty');
    }
}
