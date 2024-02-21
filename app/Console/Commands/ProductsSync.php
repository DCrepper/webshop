<?php

namespace App\Console\Commands;

use App\Enums\WordpressEndpoints;
use App\Models\Product;
use Automattic\WooCommerce\Client;
use Illuminate\Console\Command;

/**
 * Class ProductsSync
 *
 * This class represents a command for synchronizing products.
 */
class ProductsSync extends Command
{
    /**
     * Helper
     */
    public Client $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Syncing products...');
        $this->client = new Client(
            config('app.wordpress_wc_baseurl'),
            config('app.woocommerce_api_key'),
            config('app.woocommerce_api_secret_key'),
            [
                'version' => 'wc/v3',
            ]
        );
        $products = $this->client->get(WordpressEndpoints::PRODUCTS);
        foreach ($products as $product) {
            $product_tmp = (array) $product;
            $product = Product::where('id', $product_tmp['id'])->firstOrCreate();
            //dd($product);
            $product->update([
                'id' => $product_tmp['id'],
                'product_id' => $product_tmp['id'],
                'name' => $product_tmp['name'],
                'slug' => $product_tmp['slug'],
                'type' => $product_tmp['type'],
                'status' => $product['status'],
                'catalog_visibility' => $product_tmp['catalog_visibility'],
                'description' => $product_tmp['description'],
                'short_description' => $product_tmp['short_description'],
                'sku' => $product_tmp['sku'],
                'price' => $product_tmp['price'],
                'regular_price' => $product_tmp['regular_price'],
                'sale_price' => $product_tmp['sale_price'],
                'stock_quantity' => $product_tmp['stock_quantity'],
                'stock_status' => $product_tmp['stock_status'],
                'weight' => $product_tmp['weight'],
                'length' => $product_tmp['dimensions']->length,
                'width' => $product_tmp['dimensions']->width,
                'height' => $product_tmp['dimensions']->height,
                'shipping_class' => $product_tmp['shipping_class'],
            ]);
        }
    }
}
