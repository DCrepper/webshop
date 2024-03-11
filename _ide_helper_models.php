<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItem
 * @property-read int|null $cart_item_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CartItem
 *
 * @property-read \App\Models\Cart|null $cart
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\CartItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $order_items
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentGateWay
 *
 * @method static \Database\Factories\PaymentGateWayFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay query()
 */
	class PaymentGateWay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WoocommerceProductCategory> $categories
 * @property-read int|null $categories_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Session
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property mixed $password
 * @property-read \App\Models\Cart|null $cart
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WoocommerceProductCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\WoocommerceProductCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory query()
 */
	class WoocommerceProductCategory extends \Eloquent {}
}

