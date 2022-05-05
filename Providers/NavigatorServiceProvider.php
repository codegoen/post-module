<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Entities\User;
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
                            ->for('/post')
                            ->heroicon('PencilAltIcon')
                            ->icon('outline'),
                        Nav::item(__('Category'))
                            ->for('/category')
                            ->heroicon('TagIcon')
                            ->icon('outline'),
                        Nav::item(__('Media Library'))
                            ->for('/media-library')
                            ->heroicon('ColorSwatchIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        }, 'post');
    }
}
