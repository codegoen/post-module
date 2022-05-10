<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Entities\User;
use Nedwors\Navigator\Facades\Nav;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Post'))->subItems(
                    [
                        Nav::item(__('Post'))
                            ->for(route('dashboard.post.post.index'))
                            ->heroicon('PencilAltIcon')
                            ->icon('outline'),
                        Nav::item(__('Category'))
                            ->for(route('dashboard.post.category.index'))
                            ->heroicon('TagIcon')
                            ->icon('outline'),
                        Nav::item(__('Subscriber'))
                            ->for(route('dashboard.post.subscriber.index'))
                            ->heroicon('MailIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        }, 'post');
    }
}
