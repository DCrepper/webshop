<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string $status
 * @property string $catalog_visibility
 * @property string $description
 * @property string $short_description
 * @property string $sku
 * @property string $price
 * @property string $regular_price
 * @property string $sale_price
 * @property string $stock_quantity
 * @property string $stock_status
 * @property string $weight
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $shipping_class
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $fillable = [
		'name',
		'slug',
		'type',
		'status',
		'catalog_visibility',
		'description',
		'short_description',
		'sku',
		'price',
		'regular_price',
		'sale_price',
		'stock_quantity',
		'stock_status',
		'weight',
		'length',
		'width',
		'height',
		'shipping_class'
	];
}
