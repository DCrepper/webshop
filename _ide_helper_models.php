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
 * @property int $id
 * @property int|null $user_id
 * @property string $session_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItem
 * @property-read int|null $cart_item_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CartItem
 *
 * @property int $id
 * @property int $product_id
 * @property int $cart_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart|null $cart
 * @property-read \App\Models\Product|null $product
 * @method static \Database\Factories\CartItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereUpdatedAt($value)
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MenuLink
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $published
 * @property string|null $title
 * @property string|null $description
 * @property int|null $position
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property-read \A17\Twill\Models\NestedsetCollection<int, MenuLink> $children
 * @property-read int|null $children_count
 * @property-read string $ancestors_slug
 * @property-read string $nested_slug
 * @property-read MenuLink|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\RelatedItem> $relatedItems
 * @property-read int|null $related_items_count
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model accessible()
 * @method static \A17\Twill\Models\NestedsetCollection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model draft()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink fixTree($root = null)
 * @method static \A17\Twill\Models\NestedsetCollection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model onlyTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink ordered()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model published()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model publishedInListings()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model visible()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereDeletedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink wherePosition($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink wherePublished($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model whereTag($tags, string $type = 'slug')
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLink withTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|MenuLink withoutRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLink withoutTrashed()
 */
	class MenuLink extends \Eloquent implements \A17\Twill\Models\Behaviors\Sortable {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $payment_method
 * @property string $payment_method_title
 * @property bool $set_paid
 * @property string|null $billing_first_name
 * @property string|null $billing_last_name
 * @property string|null $billing_address_1
 * @property string|null $billing_address_2
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_postcode
 * @property string|null $billing_country
 * @property string|null $billing_email
 * @property string|null $billing_phone
 * @property string|null $shipping_first_name
 * @property string|null $shipping_last_name
 * @property string|null $shipping_address_1
 * @property string|null $shipping_address_2
 * @property string|null $shipping_city
 * @property string|null $shipping_state
 * @property string|null $shipping_postcode
 * @property string|null $shipping_country
 * @property string $shipping_tracking_number
 * @property string $shipping_lines_method_id
 * @property string $shipping_lines_method_title
 * @property string $shipping_lines_total
 * @property string|null $order_id
 * @property string|null $order_key
 * @property string $order_status
 * @property string $order_currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $order_items
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingPostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSetPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingLinesMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingLinesMethodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingLinesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingPostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingTrackingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $tax_class
 * @property string $subtotal
 * @property string $subtotal_tax
 * @property string $total
 * @property string $total_tax
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereSubtotalTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTaxClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTotalTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $published
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Block> $blocks
 * @property-read int|null $blocks_count
 * @property-read string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Media> $medias
 * @property-read int|null $medias_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Revisions\PageRevision> $revisions
 * @property-read int|null $revisions_count
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Slugs\PageSlug> $slugs
 * @property-read int|null $slugs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\Translations\PageTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Translations\PageTranslation> $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Model accessible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|Page forFallbackLocaleSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page forInactiveSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page forSlug(string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Page mine()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByRawByTranslation($orderRawString, $groupByField, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page orderByTranslation($orderField, $orderType = 'ASC', $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Model published()
 * @method static \Illuminate\Database\Eloquent\Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Page translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withActiveTranslations(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTranslation()
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page withoutTrashed()
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentGateWay
 *
 * @property int $id
 * @property string $payment_gate_way_id
 * @property string $title
 * @property string $description
 * @property bool $enabled
 * @property string $method_title
 * @property string $method_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PaymentGateWayFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereMethodDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereMethodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay wherePaymentGateWayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentGateWay whereUpdatedAt($value)
 */
	class PaymentGateWay extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $product_id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $type
 * @property string|null $status
 * @property string|null $catalog_visibility
 * @property string|null $description
 * @property string|null $short_description
 * @property string $sku
 * @property string|null $price
 * @property string|null $regular_price
 * @property string|null $sale_price
 * @property string|null $stock_quantity
 * @property string|null $stock_status
 * @property string|null $weight
 * @property string|null $length
 * @property string|null $width
 * @property string|null $height
 * @property string|null $shipping_class
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WoocommerceProductCategory> $categories
 * @property-read int|null $categories_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCatalogVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRegularPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWidth($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models\Revisions{
/**
 * App\Models\Revisions\MenuLinkRevision
 *
 * @property-read mixed $by_user
 * @property-read \A17\Twill\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkRevision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkRevision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkRevision query()
 */
	class MenuLinkRevision extends \Eloquent {}
}

namespace App\Models\Revisions{
/**
 * App\Models\Revisions\PageRevision
 *
 * @property int $id
 * @property int $page_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $payload
 * @property-read mixed $by_user
 * @property-read \A17\Twill\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageRevision whereUserId($value)
 */
	class PageRevision extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Session
 *
 * @property string $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserId($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models\Slugs{
/**
 * App\Models\Slugs\MenuLinkSlug
 *
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Model accessible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkSlug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkSlug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model published()
 * @method static \Illuminate\Database\Eloquent\Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkSlug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkSlug withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkSlug withoutTrashed()
 */
	class MenuLinkSlug extends \Eloquent {}
}

namespace App\Models\Slugs{
/**
 * App\Models\Slugs\PageSlug
 *
 * @property int $id
 * @property int $page_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property string $locale
 * @property int $active
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Model accessible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model published()
 * @method static \Illuminate\Database\Eloquent\Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageSlug withoutTrashed()
 */
	class PageSlug extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\MenuLinkTranslation
 *
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Model accessible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model published()
 * @method static \Illuminate\Database\Eloquent\Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkTranslation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|MenuLinkTranslation withoutTrashed()
 */
	class MenuLinkTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\PageTranslation
 *
 * @property int $id
 * @property int $page_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $locale
 * @property int $active
 * @property string|null $title
 * @property string|null $description
 * @property-write mixed $publish_start_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Model accessible()
 * @method static \Illuminate\Database\Eloquent\Builder|Model draft()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model published()
 * @method static \Illuminate\Database\Eloquent\Builder|Model publishedInListings()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model visible()
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model whereTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Model withTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|PageTranslation withoutTrashed()
 */
	class PageTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WoocommerceProductCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $parent
 * @property string|null $description
 * @property string $display
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\WoocommerceProductCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WoocommerceProductCategory whereUpdatedAt($value)
 */
	class WoocommerceProductCategory extends \Eloquent {}
}

