<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Database\Factories\CategoryTypeFactory;

class CategoryType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Register factory.
     */
    protected static function newFactory(): CategoryTypeFactory
    {
        return CategoryTypeFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'machine_name',
    ];

    /**
     * Get child categories.
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
