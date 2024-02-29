<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncProductsChunk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(public $products)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->products as $product) {
            $product_tmp = Product::where('id', $product['id'])->firstOrCreate();
            $product_tmp->update([
                'id' => $product['id'],
                'product_id' => $product['id'],
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
                'length' => $product['dimensions']['length'],
                'width' => $product['dimensions']['width'],
                'height' => $product['dimensions']['height'],
                'shipping_class' => $product['shipping_class'],
            ]);
            $ids = [];
            foreach ($product['categories'] as $category) {
                $ids[] = $category['id'];
            }
            $product_tmp->categories()->sync($ids);
        }
    }
}
