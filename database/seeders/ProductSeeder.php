<?php

namespace Database\Seeders;

use Automattic\WooCommerce\Client;
use Database\Factories\WoocommerceProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         $products = WoocommerceProductFactory::new()->count(1000)->create();

         foreach ($products as $product) {
             $product = $product->toArray();
             $woocommerce = new Client(
                 config('app.wordpress_wc_baseurl'),
                 config('app.woocommerce_api_key'),
                 config('app.woocommerce_api_secret_key'),
                 [
                     'version' => 'wc/v3',
                 ]
             );
             unset($product['id']);
             unset($product['updated_at']);
             unset($product['created_at']);
             //dd((array) $product);
             $woocommerce->post('products', $product);
         }
        */
    }
}
