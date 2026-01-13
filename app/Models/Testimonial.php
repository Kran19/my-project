<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTestimonial
 */
class Testimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'author_name',
        'author_designation',
        'author_image_id',
        'rating',
        'content',
        'metadata',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'metadata' => 'array',
        'status' => 'boolean',
    ];

    // Relationships
    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'author_image_id');
    }
}