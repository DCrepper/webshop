<?php

namespace App\Console\Commands;

use App\Jobs\SyncProducts;
use Illuminate\Console\Command;

class ImportWooCommerceProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:woocommerce-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import WooCommerce products every day at midnight';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SyncProducts::dispatch();
        $this->info('WooCommerce product import job dispatched!');
    }
}
