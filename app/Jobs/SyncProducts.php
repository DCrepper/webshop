<?php

namespace App\Jobs;

use App\Enums\WordpressEndpoints;
use App\Models\WoocommerceProductCategory;
use Automattic\WooCommerce\Client;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class SyncProducts implements ShouldQueue
{
    use Batchable , Dispatchable, InteractsWithQueue, Queueable,SerializesModels;

    /**
     * Create a new job instance.
     */
    // Giving a timeout of 20 minutes to the Job to process the products
    public $timeout = 5000;

    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $woocommerce = new Client(
            config('app.wordpress_wc_baseurl'),
            config('app.woocommerce_api_key'),
            config('app.woocommerce_api_secret_key'),
            [
                'version' => 'wc/v3',
            ]
        );
        Artisan::call('migrate:refresh', ['--path' => 'database/migrations/2024_02_12_104120_create_products_table.php']);
        $categories = $woocommerce->get(WordpressEndpoints::PRODUCTSCATEGORIES, ['per_page' => 100]);
        $categories = json_decode(json_encode($categories), true);
        foreach ($categories as $category) {
            $category_tmp = WoocommerceProductCategory::where('id', $category['id'])->firstOrCreate();
            $category_tmp->update([
                'id' => $category['id'],
                'name' => $category['name'],
                'slug' => $category['slug'],
                'parent' => $category['parent'],
                'description' => $category['description'],
                'display' => $category['display'],
            ]);
        }
        $products = $woocommerce->get(WordpressEndpoints::PRODUCTS, ['per_page' => 10000]);
        $products = json_decode(json_encode($products), true);
        $chunks = array_chunk($products, 200);
        foreach ($chunks as $chunk) {
            SyncProductsChunk::dispatch($chunk);
        }

    }
}
