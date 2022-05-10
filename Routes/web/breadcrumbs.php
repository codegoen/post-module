<?php

use Modules\Post\Entities\Post;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

Breadcrumbs::for(
    'post.index',
    fn (Trail $trail) => $trail->push(__('Post'), route('post.index'))
);

Breadcrumbs::for(
    'post.create',
    fn (Trail $trail) => $trail->parent('post.index')->push(__('New'), route('post.create'))
);

Breadcrumbs::for(
    'post.edit',
    fn (Trail $trail, Post $post) => $trail->parent('post.index')->push(__('Edit'), route('post.edit', $post))
);

Breadcrumbs::for(
    'category.index',
    fn (Trail $trail) => $trail->push(__('Category'), route('category.index'))
);

Breadcrumbs::for(
    'subscriber.index',
    fn (Trail $trail) => $trail->push(__('Subscriber'), route('subscriber.index'))
);
