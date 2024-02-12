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
 * App\Models\Page
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $published
 * @property int|null $position
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Block> $blocks
 * @property-read int|null $blocks_count
 * @property-read \A17\Twill\Models\NestedsetCollection<int, Page> $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\File> $files
 * @property-read int|null $files_count
 * @property-read string $ancestors_slug
 * @property-read string $nested_slug
 * @property-read string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \A17\Twill\Models\Media> $medias
 * @property-read int|null $medias_count
 * @property-read Page|null $parent
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
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model accessible()
 * @method static \A17\Twill\Models\NestedsetCollection<int, static> all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model draft()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page fixTree($root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page forFallbackLocaleSlug(string $slug)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page forInactiveSlug(string $slug)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page forSlug(string $slug)
 * @method static \A17\Twill\Models\NestedsetCollection<int, static> get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page listsTranslations(string $translationField)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page mine()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page notTranslatedIn(?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model onlyTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orderByRawByTranslation($orderRawString, $groupByField, $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page orderByTranslation($orderField, $orderType = 'ASC', $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page ordered()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model published()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model publishedInListings()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page translated()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page translatedIn(?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model visible()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereDeletedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereNodeBetween($values, $boolean = 'and', $not = false, $query = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page wherePosition($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page wherePublished($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model whereTag($tags, string $type = 'slug')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page withActiveTranslations(?string $locale = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model withTag($tags, string $type = 'slug')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page withTranslation()
 * @method static \Illuminate\Database\Eloquent\Builder|Page withTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Page withoutRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Model withoutTag($tags, string $type = 'slug')
 * @method static \Illuminate\Database\Eloquent\Builder|Page withoutTrashed()
 */
	class Page extends \Eloquent implements \A17\Twill\Models\Behaviors\Sortable {}
}

namespace App\Models{
/**
 * App\Models\Product
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
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

