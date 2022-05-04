<?php

namespace Modules\Post\Entities;

use App\Models\Relations\HasAuthor;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasUuid,
        HasAuthor,
        HasFactory,
        SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
