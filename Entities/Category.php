<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Entities\Relations\HasAuthor;
use Modules\User\Entities\Traits\HasUuid;

class Category extends Model
{
    use HasUuid,
        HasAuthor,
        HasFactory,
        SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\CategoryFactory::new();
    }
}
