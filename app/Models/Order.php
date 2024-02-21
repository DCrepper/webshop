<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property string $payment_method
 * @property string $payment_method_title
 * @property bool $set_paid
 * @property string $billing_first_name
 * @property string $billing_last_name
 * @property string $billing_address_1
 * @property string $billing_address_2
 * @property string $billing_city
 * @property string $billing_state
 * @property string $billing_postcode
 * @property string $billing_country
 * @property string $billing_email
 * @property string $billing_phone
 * @property string $shipping_first_name
 * @property string $shipping_last_name
 * @property string $shipping_address_1
 * @property string $shipping_address_2
 * @property string $shipping_city
 * @property string $shipping_state
 * @property string $shipping_postcode
 * @property string $shipping_country
 * @property string $shipping_tracking_number
 * @property string $shipping_lines_method_id
 * @property string $shipping_lines_method_title
 * @property string $shipping_lines_total
 * @property string|null $order_id
 * @property string|null $order_key
 * @property string $order_status
 * @property string $order_currency
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|OrderItem[] $order_items
 */
class Order extends Model
{
    protected $table = 'orders';

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'set_paid' => 'bool',
        'created_at' => 'date',
    ];

    protected $fillable = [
        'payment_method',
        'payment_method_title',
        'set_paid',
        'billing_first_name',
        'billing_last_name',
        'billing_address_1',
        'billing_address_2',
        'billing_city',
        'billing_state',
        'billing_postcode',
        'billing_country',
        'billing_email',
        'billing_phone',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_city',
        'shipping_state',
        'shipping_postcode',
        'shipping_country',
        'shipping_tracking_number',
        'shipping_lines_method_id',
        'shipping_lines_method_title',
        'shipping_lines_total',
        'order_id',
        'order_key',
        'order_status',
        'order_currency',
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
