<?php

declare(strict_types=1);

namespace Modules\Post\Datatable;

use Illuminate\Database\Eloquent\Builder;
use Modules\Post\Entities\Category;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class CategoryDatatable extends Inertable
{
    public function query(): Builder
    {
        return Category::query()->withCount('posts');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')->sortable()->searchable(),
            Column::make(__('Description'), 'description')->searchable(),
            Column::make(__('Created'), 'created_at')->sortable(),
            Column::make(__('Total Post'), 'posts_count')->sortable(),
            Column::make(__('Author'), 'author.username')->sortable()->searchable(),
            Column::action(),
        ];
    }
}
