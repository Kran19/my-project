<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'product_type',
        'brand_id',
        'main_category_id',
        'tax_class_id',
        'short_description',
        'description',
        'status',
        'is_featured',
        'is_new',
        'is_bestseller',
        'weight',
        'length',
        'width',
        'height',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'product_code',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_new' => 'boolean',
        'is_bestseller' => 'boolean',
        'weight' => 'decimal:3',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
    ];

    // Relationships
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function mainCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'main_category_id');
    }

    public function taxClass(): BelongsTo
    {
        return $this->belongsTo(TaxClass::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function defaultVariant(): HasOne
    {
        return $this->hasOne(ProductVariant::class)->where('is_default', true);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product')
            ->withPivot('is_primary', 'sort_order')
            ->withTimestamps();
    }

    public function primaryCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'main_category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags')
            ->withTimestamps();
    }

    public function relatedProducts(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'related_products', 'product_id', 'related_product_id')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function crossSellProducts(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'cross_sell_products', 'product_id', 'cross_sell_product_id')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function upsellProducts(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'upsell_products', 'product_id', 'upsell_product_id')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'product_specifications')
            ->withPivot('specification_value_id', 'custom_value')
            ->withTimestamps();
    }

    public function productSpecifications(): HasMany
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->reviews()->where('status', 'approved');
    }

    public function seoMetadata(): HasOne
    {
        return $this->hasOne(SeoMetadata::class, 'entity_id')
            ->where('entity_type', self::class);
    }

    public function orderItems(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItem::class, ProductVariant::class);
    }

    public function wishlistItems(): HasManyThrough
    {
        return $this->hasManyThrough(WishlistItem::class, ProductVariant::class);
    }

    public function cartItems(): HasManyThrough
    {
        return $this->hasManyThrough(CartItem::class, ProductVariant::class);
    }
}