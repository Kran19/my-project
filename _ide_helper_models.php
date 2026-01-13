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
 * @property int $id
 * @property int|null $admin_id
 * @property int|null $customer_id
 * @property string $action
 * @property string|null $entity_type
 * @property int|null $entity_id
 * @property array<array-key, mixed>|null $old_data
 * @property array<array-key, mixed>|null $new_data
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property array<array-key, mixed>|null $additional_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $entity
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereAdditionalData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereNewData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereOldData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivityLog whereUserAgent($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperActivityLog {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $activityLogs
 * @property-read int|null $activity_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransfer> $approvedTransfers
 * @property-read int|null $approved_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AuditTrail> $auditTrails
 * @property-read int|null $audit_trails_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransfer> $inventoryTransfers
 * @property-read int|null $inventory_transfers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderStatusHistory> $orderStatusHistories
 * @property-read int|null $order_status_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PriceHistory> $priceHistories
 * @property-read int|null $price_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $productReviews
 * @property-read int|null $product_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StockHistory> $stockHistories
 * @property-read int|null $stock_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admin withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property bool $is_variant
 * @property bool $is_filterable
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeValue> $values
 * @property-read int|null $values_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariantAttribute> $variantAttributes
 * @property-read int|null $variant_attributes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereIsFilterable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereIsVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attribute withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAttribute {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $attribute_id
 * @property string $value
 * @property string $label
 * @property string|null $color_code
 * @property int|null $image_id
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Media|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariantAttribute> $variantAttributes
 * @property-read int|null $variant_attributes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereColorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttributeValue withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAttributeValue {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $auditable_type
 * @property int $auditable_id
 * @property int|null $admin_id
 * @property int|null $customer_id
 * @property string $event
 * @property array<array-key, mixed>|null $old_values
 * @property array<array-key, mixed>|null $new_values
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $url
 * @property array<array-key, mixed>|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $auditable
 * @property-read \App\Models\Customer|null $customer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereAuditableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereAuditableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereNewValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereOldValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuditTrail whereUserAgent($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAuditTrail {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $logo_id
 * @property bool $status
 * @property int $sort_order
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Media|null $logo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\SeoMetadata|null $seoMetadata
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereLogoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Brand withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBrand {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $session_id
 * @property int|null $currency_id
 * @property string $status
 * @property numeric $subtotal
 * @property numeric $tax_total
 * @property numeric $shipping_total
 * @property numeric $discount_total
 * @property numeric $grand_total
 * @property int|null $offer_id
 * @property int|null $shipping_address_id
 * @property int|null $billing_address_id
 * @property \Illuminate\Support\Carbon|null $abandoned_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomerAddress|null $billingAddress
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Offer|null $offer
 * @property-read \App\Models\CustomerAddress|null $shippingAddress
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereAbandonedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereBillingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereDiscountTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereShippingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereShippingTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereTaxTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCart {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $cart_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property numeric $unit_price
 * @property numeric $total
 * @property numeric $discount_amount
 * @property int|null $offer_id
 * @property array<array-key, mixed>|null $attributes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cart $cart
 * @property-read \App\Models\Offer|null $offer
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\ProductVariant $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCartItem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property bool $status
 * @property bool $featured
 * @property bool $show_in_nav
 * @property int $sort_order
 * @property int|null $image_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $ancestors
 * @property-read int|null $ancestors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attribute> $attributes
 * @property-read int|null $attributes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $descendants
 * @property-read int|null $descendants_count
 * @property-read \App\Models\Media|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $primaryProducts
 * @property-read int|null $primary_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\SeoMetadata|null $seoMetadata
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SpecificationGroup> $specificationGroups
 * @property-read int|null $specification_groups_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereShowInNav($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property int $attribute_id
 * @property bool $is_required
 * @property bool $is_filterable
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereIsFilterable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategoryAttribute {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $ancestor_id
 * @property int $descendant_id
 * @property int $depth
 * @property-read \App\Models\Category $ancestor
 * @property-read \App\Models\Category $descendant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy whereAncestorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy whereDescendantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryHierarchy whereId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategoryHierarchy {}
}

namespace App\Models{
/**
 * @property int $product_id
 * @property int $category_id
 * @property bool $is_primary
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategoryProduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property int $spec_group_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\SpecificationGroup $group
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereSpecGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategorySpecGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategorySpecGroup {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $cross_sell_product_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $crossSellProduct
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereCrossSellProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CrossSellProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCrossSellProduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $symbol
 * @property numeric $exchange_rate
 * @property bool $is_default
 * @property bool $is_active
 * @property int $decimal_places
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GiftCard> $giftCards
 * @property-read int|null $gift_cards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereDecimalPlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCurrency {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $mobile
 * @property string $password
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $mobile_verified_at
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $activityLogs
 * @property-read int|null $activity_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerAddress> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AuditTrail> $auditTrails
 * @property-read int|null $audit_trails_count
 * @property-read \App\Models\CustomerAddress|null $billingAddress
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerLoyalty> $customerLoyalty
 * @property-read int|null $customer_loyalty_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GiftCard> $giftCards
 * @property-read int|null $gift_cards_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PasswordHistory> $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $productReviews
 * @property-read int|null $product_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GiftCard> $receivedGiftCards
 * @property-read int|null $received_gift_cards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Returns> $returns
 * @property-read int|null $returns_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewVote> $reviewVotes
 * @property-read int|null $review_votes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerSegment> $segments
 * @property-read int|null $segments_count
 * @property-read \App\Models\CustomerAddress|null $shippingAddress
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Wishlist> $wishlists
 * @property-read int|null $wishlists_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereMobileVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCustomer {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $customer_id
 * @property string $type
 * @property string $name
 * @property string $mobile
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property bool $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $billingCarts
 * @property-read int|null $billing_carts_count
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $shippingCarts
 * @property-read int|null $shipping_carts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCustomerAddress {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\LoyaltyProgram|null $program
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LoyaltyTransaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerLoyalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerLoyalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerLoyalty query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCustomerLoyalty {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property array<array-key, mixed>|null $conditions
 * @property int $customer_count
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer> $customers
 * @property-read int|null $customers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerSegmentMember> $members
 * @property-read int|null $members_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TierPrice> $tierPrices
 * @property-read int|null $tier_prices_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereCustomerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCustomerSegment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $customer_id
 * @property int $customer_segment_id
 * @property \Illuminate\Support\Carbon $added_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\CustomerSegment $segment
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember whereAddedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember whereCustomerSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerSegmentMember whereId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCustomerSegmentMember {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $message_id
 * @property string $from
 * @property string $to
 * @property string $subject
 * @property string $status
 * @property array<array-key, mixed>|null $metadata
 * @property \Illuminate\Support\Carbon $sent_at
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $opened_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereOpenedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEmailLog {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property numeric $initial_value
 * @property numeric $current_value
 * @property int|null $currency_id
 * @property int|null $purchased_by
 * @property int|null $recipient_id
 * @property string|null $recipient_email
 * @property string|null $recipient_name
 * @property string|null $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Customer|null $purchaser
 * @property-read \App\Models\Customer|null $recipient
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GiftCardTransaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereCurrentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereInitialValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard wherePurchasedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereRecipientEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereRecipientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCard withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperGiftCard {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $gift_card_id
 * @property numeric $amount
 * @property numeric $balance_before
 * @property numeric $balance_after
 * @property string|null $reference_type
 * @property int|null $reference_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GiftCard $giftCard
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $reference
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereBalanceAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereBalanceBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereGiftCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereReferenceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GiftCardTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperGiftCardTransaction {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $content
 * @property string $type
 * @property array<array-key, mixed>|null $data
 * @property array<array-key, mixed>|null $display_rules
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereDisplayRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HomePageSection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperHomePageSection {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $transfer_number
 * @property int $from_warehouse_id
 * @property int $to_warehouse_id
 * @property string $status
 * @property string|null $notes
 * @property int|null $created_by
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property \Illuminate\Support\Carbon|null $shipped_at
 * @property \Illuminate\Support\Carbon|null $received_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $approvedBy
 * @property-read \App\Models\Admin|null $createdBy
 * @property-read \App\Models\Warehouse $fromWarehouse
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransferItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Warehouse $toWarehouse
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereFromWarehouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereShippedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereToWarehouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereTransferNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransfer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInventoryTransfer {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $inventory_transfer_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property int $received_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InventoryTransfer $transfer
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereInventoryTransferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereReceivedQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryTransferItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInventoryTransferItem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property numeric $points_per_currency
 * @property int $signup_bonus
 * @property int $first_purchase_bonus
 * @property numeric $min_redeemable_points
 * @property numeric $point_value
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerLoyalty> $customerLoyalties
 * @property-read int|null $customer_loyalties_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereFirstPurchaseBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereMinRedeemablePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram wherePointValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram wherePointsPerCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereSignupBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyProgram whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLoyaltyProgram {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $customer_loyalty_id
 * @property string $type
 * @property numeric $points
 * @property numeric $balance
 * @property string|null $reference_type
 * @property int|null $reference_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomerLoyalty $customerLoyalty
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $reference
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereCustomerLoyaltyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereReferenceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoyaltyTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLoyaltyTransaction {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property string $disk
 * @property string|null $mime_type
 * @property string $file_type
 * @property int $file_size
 * @property array<array-key, mixed>|null $thumbnails
 * @property array<array-key, mixed>|null $metadata
 * @property string|null $alt_text
 * @property int|null $uploaded_by
 * @property string|null $uploader_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeValue> $attributeValues
 * @property-read int|null $attribute_values_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Brand> $brands
 * @property-read int|null $brands_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewImage> $reviewImages
 * @property-read int|null $review_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Testimonial> $testimonial
 * @property-read int|null $testimonial_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploader
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariantImage> $variantImages
 * @property-read int|null $variant_images_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereThumbnails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereUploadedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media whereUploaderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Media withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperMedia {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $template_id
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $subject
 * @property string $content
 * @property string $type
 * @property string $status
 * @property array<array-key, mixed>|null $data
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @property-read \App\Models\NotificationTemplate|null $template
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotification {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $subject
 * @property string $content
 * @property string $type
 * @property string $trigger_event
 * @property bool $is_active
 * @property array<array-key, mixed>|null $variables
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereTriggerEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationTemplate whereVariables($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotificationTemplate {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property bool $status
 * @property string $offer_type
 * @property numeric|null $discount_value
 * @property int|null $buy_qty
 * @property int|null $get_qty
 * @property numeric|null $min_cart_amount
 * @property numeric|null $max_cart_amount
 * @property numeric|null $max_discount
 * @property int|null $max_uses
 * @property int|null $uses_per_customer
 * @property int $used_count
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property bool $is_auto_apply
 * @property bool $is_stackable
 * @property bool $is_exclusive
 * @property int|null $customer_segment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\CustomerSegment|null $customerSegment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OfferReward> $rewards
 * @property-read int|null $rewards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OfferUsage> $usages
 * @property-read int|null $usages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariant> $variants
 * @property-read int|null $variants_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereBuyQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereCustomerSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereGetQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereIsAutoApply($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereIsExclusive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereIsStackable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereMaxCartAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereMaxDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereMaxUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereMinCartAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereOfferType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUsedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer whereUsesPerCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Offer withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOffer {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $offer_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Offer $offer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOfferCategory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $offer_id
 * @property int $reward_product_id
 * @property int|null $reward_variant_id
 * @property int $reward_qty
 * @property bool $same_as_buy_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Offer $offer
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereRewardProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereRewardQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereRewardVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereSameAsBuyProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferReward whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOfferReward {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $offer_id
 * @property int|null $customer_id
 * @property int|null $order_id
 * @property numeric|null $discount_amount
 * @property \Illuminate\Support\Carbon $used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Offer $offer
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferUsage whereUsedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOfferUsage {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $offer_id
 * @property int $product_variant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Offer $offer
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OfferVariant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOfferVariant {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $order_number
 * @property int|null $customer_id
 * @property int|null $shipping_method_id
 * @property int|null $payment_method_id
 * @property int|null $currency_id
 * @property string $status
 * @property string $payment_status
 * @property string $shipping_status
 * @property numeric $subtotal
 * @property numeric $tax_total
 * @property numeric $shipping_total
 * @property numeric $discount_total
 * @property numeric $grand_total
 * @property int|null $offer_id
 * @property numeric $loyalty_points_used
 * @property numeric $loyalty_points_earned
 * @property array<array-key, mixed>|null $shipping_address
 * @property array<array-key, mixed>|null $billing_address
 * @property string|null $customer_notes
 * @property string|null $admin_notes
 * @property string|null $cancellation_reason
 * @property \Illuminate\Support\Carbon|null $cancelled_at
 * @property \Illuminate\Support\Carbon|null $confirmed_at
 * @property \Illuminate\Support\Carbon|null $processing_at
 * @property \Illuminate\Support\Carbon|null $shipped_at
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Payment|null $latestPayment
 * @property-read \App\Models\Shipment|null $latestShipment
 * @property-read \App\Models\Offer|null $offer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OfferUsage> $offerUsages
 * @property-read int|null $offer_usages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PaymentAttempt> $paymentAttempts
 * @property-read int|null $payment_attempts_count
 * @property-read \App\Models\PaymentMethod|null $paymentMethod
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Returns> $returns
 * @property-read int|null $returns_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shipment> $shipments
 * @property-read int|null $shipments_count
 * @property-read \App\Models\ShippingMethod|null $shippingMethod
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderStatusHistory> $statusHistory
 * @property-read int|null $status_history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAdminNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereBillingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCancellationReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCancelledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscountTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereLoyaltyPointsEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereLoyaltyPointsUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereProcessingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippingTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTaxTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrder {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int $product_variant_id
 * @property string $product_name
 * @property string $sku
 * @property int $quantity
 * @property numeric $unit_price
 * @property numeric|null $compare_price
 * @property numeric $total
 * @property numeric $discount_amount
 * @property array<array-key, mixed>|null $attributes
 * @property int|null $offer_id
 * @property numeric $loyalty_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Offer|null $offer
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReturnItem> $returnItems
 * @property-read int|null $return_items_count
 * @property-read \App\Models\ProductReview|null $review
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShipmentItem> $shipmentItems
 * @property-read int|null $shipment_items_count
 * @property-read \App\Models\ProductVariant $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereLoyaltyPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrderItem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $prefix
 * @property int $last_number
 * @property int|null $year
 * @property int|null $month
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereLastNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderSequence whereYear($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrderSequence {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderStatusHistory query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrderStatusHistory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $user_type
 * @property int $user_id
 * @property string $password_hash
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory wherePasswordHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordHistory whereUserType($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPasswordHistory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int $payment_method_id
 * @property string|null $transaction_id
 * @property numeric $amount
 * @property int|null $currency_id
 * @property string|null $payment_gateway
 * @property string $status
 * @property array<array-key, mixed>|null $request_data
 * @property array<array-key, mixed>|null $response_data
 * @property string|null $failure_reason
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Returns> $returns
 * @property-read int|null $returns_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereFailureReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereRequestData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereResponseData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPayment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int $payment_method_id
 * @property string $attempt_id
 * @property numeric $amount
 * @property string $status
 * @property array<array-key, mixed>|null $gateway_response
 * @property string|null $failure_reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereAttemptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereFailureReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereGatewayResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentAttempt whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPaymentAttempt {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property bool $is_active
 * @property array<array-key, mixed>|null $config
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PaymentAttempt> $paymentAttempts
 * @property-read int|null $payment_attempts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPaymentMethod {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string $content
 * @property string $type
 * @property string $trigger
 * @property int $delay_seconds
 * @property array<array-key, mixed>|null $display_rules
 * @property array<array-key, mixed>|null $targeting_rules
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property bool $status
 * @property int $impressions
 * @property int $conversions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PopupStat> $stats
 * @property-read int|null $stats_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereDelaySeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereDisplayRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereImpressions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereTargetingRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereTrigger($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Popup withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPopup {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $popup_id
 * @property string|null $session_id
 * @property int|null $customer_id
 * @property string $action
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property array<array-key, mixed>|null $page_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Popup $popup
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat wherePageData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat wherePopupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PopupStat whereUserAgent($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPopupStat {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_variant_id
 * @property numeric $old_price
 * @property numeric $new_price
 * @property numeric|null $old_compare_price
 * @property numeric|null $new_compare_price
 * @property int|null $changed_by
 * @property string|null $change_reason
 * @property \Illuminate\Support\Carbon $effective_from
 * @property \Illuminate\Support\Carbon|null $effective_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $changedBy
 * @property-read \App\Models\ProductVariant $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereChangeReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereChangedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereEffectiveFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereEffectiveTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereNewComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereOldComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PriceHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPriceHistory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $product_type
 * @property int|null $brand_id
 * @property int|null $main_category_id
 * @property int|null $tax_class_id
 * @property string|null $short_description
 * @property string|null $description
 * @property string $status
 * @property bool $is_featured
 * @property bool $is_new
 * @property bool $is_bestseller
 * @property numeric|null $weight
 * @property numeric|null $length
 * @property numeric|null $width
 * @property numeric|null $height
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $canonical_url
 * @property string|null $product_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $approvedReviews
 * @property-read int|null $approved_reviews_count
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $crossSellProducts
 * @property-read int|null $cross_sell_products_count
 * @property-read \App\Models\ProductVariant|null $defaultVariant
 * @property-read \App\Models\Category|null $mainCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\Category|null $primaryCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSpecification> $productSpecifications
 * @property-read int|null $product_specifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $relatedProducts
 * @property-read int|null $related_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\SeoMetadata|null $seoMetadata
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specification> $specifications
 * @property-read int|null $specifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\TaxClass|null $taxClass
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Product> $upsellProducts
 * @property-read int|null $upsell_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariant> $variants
 * @property-read int|null $variants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WishlistItem> $wishlistItems
 * @property-read int|null $wishlist_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCanonicalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIsBestseller($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMainCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereTaxClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int|null $product_variant_id
 * @property int|null $customer_id
 * @property int|null $admin_id
 * @property int|null $order_item_id
 * @property int $rating
 * @property string|null $title
 * @property string|null $comment
 * @property string $status
 * @property bool $is_verified
 * @property bool $is_featured
 * @property bool $is_admin_review
 * @property int $helpful_count
 * @property int $not_helpful_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\OrderItem|null $orderItem
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductVariant|null $variant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewVote> $votes
 * @property-read int|null $votes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereHelpfulCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereIsAdminReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereNotHelpfulCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereOrderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductReview withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductReview {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $specification_id
 * @property int|null $specification_value_id
 * @property string|null $custom_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Specification $specification
 * @property-read \App\Models\SpecificationValue|null $specificationValue
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereCustomValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereSpecificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereSpecificationValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductSpecification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductSpecification {}
}

namespace App\Models{
/**
 * @property int $product_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductTag {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property string $sku
 * @property string|null $combination_hash NULL for simple products
 * @property numeric $price
 * @property numeric|null $compare_price Price to show as "was" price
 * @property numeric|null $cost_price
 * @property int $stock_quantity
 * @property int $reserved_quantity Quantity reserved in carts
 * @property string $stock_status
 * @property bool $is_default Default variant to show first
 * @property bool $status
 * @property numeric|null $weight
 * @property numeric|null $length
 * @property numeric|null $width
 * @property numeric|null $height
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AttributeValue> $attributes
 * @property-read int|null $attributes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItems
 * @property-read int|null $cart_items_count
 * @property-read mixed $stock_available
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Media> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransferItem> $inventoryTransferItems
 * @property-read int|null $inventory_transfer_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offer> $offers
 * @property-read int|null $offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PriceHistory> $priceHistories
 * @property-read int|null $price_histories_count
 * @property-read \App\Models\VariantImage|null $primaryImage
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StockHistory> $stockHistories
 * @property-read int|null $stock_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TierPrice> $tierPrices
 * @property-read int|null $tier_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariantAttribute> $variantAttributes
 * @property-read int|null $variant_attributes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WarehouseStock> $warehouseStocks
 * @property-read int|null $warehouse_stocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WishlistItem> $wishlistItems
 * @property-read int|null $wishlist_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereCombinationHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereComparePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereCostPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereReservedQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereStockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant whereWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductVariant withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProductVariant {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $related_product_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Product $relatedProduct
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereRelatedProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RelatedProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRelatedProduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $return_id
 * @property int $order_item_id
 * @property int $quantity
 * @property string $condition
 * @property string|null $reason
 * @property numeric|null $refund_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OrderItem $orderItem
 * @property-read \App\Models\Returns $return
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereOrderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereReturnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReturnItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReturnItem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $return_number
 * @property int $order_id
 * @property int $customer_id
 * @property string $status
 * @property string $type
 * @property string $reason
 * @property string|null $notes
 * @property numeric|null $refund_amount
 * @property int|null $refund_payment_id
 * @property \Illuminate\Support\Carbon $requested_at
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property \Illuminate\Support\Carbon|null $received_at
 * @property \Illuminate\Support\Carbon|null $processed_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReturnItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Payment|null $refundPayment
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereProcessedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereRefundPaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereRequestedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereReturnNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Returns whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReturns {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_review_id
 * @property int $media_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Media $media
 * @property-read \App\Models\ProductReview $review
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereProductReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReviewImage {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_review_id
 * @property int|null $customer_id
 * @property string|null $session_id
 * @property string $vote
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\ProductReview $review
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereProductReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewVote whereVote($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReviewVote {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $entity_type
 * @property int $entity_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $canonical_url
 * @property string|null $robots
 * @property array<array-key, mixed>|null $og_tags
 * @property array<array-key, mixed>|null $twitter_tags
 * @property array<array-key, mixed>|null $structured_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $entity
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereCanonicalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereOgTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereRobots($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereStructuredData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereTwitterTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoMetadata whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSeoMetadata {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $group
 * @property string $key
 * @property string|null $value
 * @property string $type
 * @property string|null $options
 * @property string $label
 * @property string|null $description
 * @property bool $is_encrypted
 * @property bool $is_public
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereIsEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Setting whereValue($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSetting {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property string|null $tracking_number
 * @property string|null $carrier
 * @property string|null $carrier_service
 * @property string $status
 * @property numeric|null $weight
 * @property array<array-key, mixed>|null $dimensions
 * @property array<array-key, mixed>|null $shipping_label
 * @property \Illuminate\Support\Carbon|null $shipped_at
 * @property \Illuminate\Support\Carbon|null $estimated_delivery
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property string|null $delivery_notes
 * @property string|null $delivered_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShipmentItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCarrier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCarrierService($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDeliveredTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDeliveryNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereDimensions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereEstimatedDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereShippedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereShippingLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereTrackingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shipment whereWeight($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShipment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $shipment_id
 * @property int $order_item_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OrderItem $orderItem
 * @property-read \App\Models\Shipment $shipment
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereOrderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereShipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShipmentItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShipmentItem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $shipping_zone_id
 * @property int $shipping_method_id
 * @property numeric|null $min_weight
 * @property numeric|null $max_weight
 * @property numeric|null $min_price
 * @property numeric|null $max_price
 * @property numeric $charge
 * @property numeric|null $free_shipping_threshold
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ShippingMethod $shippingMethod
 * @property-read \App\Models\ShippingZone $shippingZone
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereFreeShippingThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereMaxWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereMinWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereShippingZoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingCharge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShippingCharge {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property bool $is_active
 * @property array<array-key, mixed>|null $config
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippingCharge> $shippingCharges
 * @property-read int|null $shipping_charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippingZone> $shippingZones
 * @property-read int|null $shipping_zones_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShippingMethod {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property array<array-key, mixed>|null $countries
 * @property array<array-key, mixed>|null $states
 * @property array<array-key, mixed>|null $zip_codes
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippingCharge> $shippingCharges
 * @property-read int|null $shipping_charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShippingMethod> $shippingMethods
 * @property-read int|null $shipping_methods_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone whereZipCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingZone withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperShippingZone {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $message_id
 * @property string $from
 * @property string $to
 * @property string $message
 * @property string $status
 * @property array<array-key, mixed>|null $metadata
 * @property \Illuminate\Support\Carbon $sent_at
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSmsLog {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $spec_group_id
 * @property int $specification_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SpecificationGroup $group
 * @property-read \App\Models\Specification $specification
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereSpecGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereSpecificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecGroupSpec whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSpecGroupSpec {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $input_type
 * @property bool $is_required
 * @property bool $is_filterable
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SpecificationGroup> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSpecification> $productSpecifications
 * @property-read int|null $product_specifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SpecificationValue> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereIsFilterable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Specification withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSpecification {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specification> $specifications
 * @property-read int|null $specifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationGroup withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSpecificationGroup {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $specification_id
 * @property string $value
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductSpecification> $productSpecifications
 * @property-read int|null $product_specifications_count
 * @property-read \App\Models\Specification $specification
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereSpecificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SpecificationValue withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSpecificationValue {}
}

namespace App\Models{
/**
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $source
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StockHistory query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperStockHistory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTag {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property bool $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TaxRate|null $defaultRate
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaxRate> $rates
 * @property-read int|null $rates_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxClass withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTaxClass {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $tax_class_id
 * @property string $name
 * @property string|null $country_code
 * @property string|null $state_code
 * @property string|null $zip_code
 * @property numeric $rate
 * @property bool $is_active
 * @property int $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TaxClass $taxClass
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereStateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereTaxClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate whereZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxRate withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTaxRate {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $author_name
 * @property string|null $author_designation
 * @property int|null $author_image_id
 * @property int $rating
 * @property string $content
 * @property array<array-key, mixed>|null $metadata
 * @property int $sort_order
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Media|null $image
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereAuthorDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereAuthorImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTestimonial {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_variant_id
 * @property int $min_quantity
 * @property int|null $max_quantity
 * @property numeric $price
 * @property string $customer_group
 * @property int|null $customer_segment_id
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomerSegment|null $customerSegment
 * @property-read \App\Models\ProductVariant|null $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereCustomerGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereCustomerSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereMaxQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereMinQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TierPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTierPrice {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $upsell_product_id
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Product $upsellProduct
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UpsellProduct whereUpsellProductId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUpsellProduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $source_url
 * @property string $target_url
 * @property string $redirect_type
 * @property bool $is_active
 * @property int $hit_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereHitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereRedirectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereSourceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereTargetUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UrlRedirect whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUrlRedirect {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $variant_id
 * @property int $attribute_id
 * @property int $attribute_value_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute $attribute
 * @property-read \App\Models\AttributeValue $attributeValue
 * @property-read \App\Models\ProductVariant $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereAttributeValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantAttribute whereVariantId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperVariantAttribute {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $variant_id
 * @property int $media_id
 * @property bool $is_primary Primary image for this variant
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Media $media
 * @property-read \App\Models\ProductVariant $variant
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VariantImage whereVariantId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperVariantImage {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $pincode
 * @property string|null $contact_person
 * @property string|null $contact_number
 * @property bool $is_default
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransfer> $incomingTransfers
 * @property-read int|null $incoming_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryTransfer> $outgoingTransfers
 * @property-read int|null $outgoing_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WarehouseStock> $stocks
 * @property-read int|null $stocks_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperWarehouse {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $warehouse_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property int $reserved_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductVariant|null $variant
 * @property-read \App\Models\Warehouse $warehouse
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereReservedQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseStock whereWarehouseId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperWarehouseStock {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property bool $is_public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WishlistItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariant> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereIsPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperWishlist {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $wishlist_id
 * @property int $product_variant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\ProductVariant $variant
 * @property-read \App\Models\Wishlist $wishlist
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WishlistItem whereWishlistId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperWishlistItem {}
}

