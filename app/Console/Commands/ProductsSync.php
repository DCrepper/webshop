<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Automattic\WooCommerce\Client;
use App\Enums\WordpressEndpoints;
use App\Models\Product;

/**
 * Class ProductsSync
 *
 * This class represents a command for synchronizing products.
 */
class ProductsSync extends Command
{
    /**
     * Helper
     * @var \GuzzleHttp\Client $client
     *
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
            $product = (array) $product;
            //dd($product);
            $pair = [
                'name' => $product['name'],
                'slug' => $product['slug'],
                'type' => $product['type'],
                'status' => $product['status'],
                'catalog_visibility' => $product['catalog_visibility'],
                'description' => $product['description'],
                'short_description' => $product['short_description'],
                'sku' => $product['sku'],
                'price' => $product['price'],
                'regular_price' => $product['regular_price'],
                'sale_price' => $product['sale_price'],
                'stock_quantity' => $product['stock_quantity'],
                'stock_status' => $product['stock_status'],
                'weight' => $product['weight'],
                'length' => $product['dimensions']->length,
                'width' => $product['dimensions']->width,
                'height' => $product['dimensions']->height,
                'shipping_class' => $product['shipping_class']
            ];
            Product::updateOrCreate($pair);
        }
    }
}
