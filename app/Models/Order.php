<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property int $cart_id
 * @property string $payment_method
 * @property string $status
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postcode
 * @property string $country
 * @property string $phone
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $total
 * @property string $currency
 * @property string $transaction_id
 * @property string $payment_status
 * @property string $payment_details
 * @property string $shipping_method
 * @property string $shipping_cost
 * @property string $shipping_details
 * @property string $shipping_tracking_number
 * @property string $shipping_address_1
 * @property string $shipping_address_2
 * @property string $shipping_city
 * @property string $shipping_state
 * @property string $shipping_postcode
 * @property string $shipping_country
 * @property string $shipping_lines_method_id
 * @property string $shipping_lines_method_title
 * @property string $shipping_lines_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Cart $cart
 */
class Order extends Model
{
    protected $table = 'orders';

    protected $casts = [
        'cart_id' => 'int',
    ];

    protected $fillable = [
        'cart_id',
        'payment_method',
        'status',
        'address_1',
        'address_2',
        'city',
        'postcode',
        'country',
        'phone',
        'email',
        'first_name',
        'last_name',
        'total',
        'currency',
        'transaction_id',
        'payment_status',
        'payment_details',
        'shipping_method',
        'shipping_cost',
        'shipping_details',
        'shipping_tracking_number',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_city',
        'shipping_state',
        'shipping_postcode',
        'shipping_country',
        'shipping_lines_method_id',
        'shipping_lines_method_title',
        'shipping_lines_total',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
