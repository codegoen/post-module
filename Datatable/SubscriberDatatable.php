<?php

declare(strict_types=1);

namespace Modules\Post\Datatable;

use Illuminate\Database\Eloquent\Builder;
use Modules\Post\Entities\Subscriber;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class SubscriberDatatable extends Inertable
{
    public function query(): Builder
    {
        return Subscriber::query();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')->sortable()->searchable(),
            Column::make(__('Email'), 'email')->searchable(),
            Column::make(__('Subscribe At'), 'subscribe_at')->sortable(),
            Column::make(__('Unsubscribe At'), 'unsubscribe_at')->sortable(),
            Column::make(__('Created'), 'created_at')->sortable(),
        ];
    }
}
