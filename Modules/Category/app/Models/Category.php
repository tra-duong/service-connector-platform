<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Register factory.
     */
    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'type',
    ];

    /**
     * Parent category.
     */
    public function getType(): BelongsTo
    {
        return $this->belongsTo(CategoryType::class);
    }

    /**
     * Parent category.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
