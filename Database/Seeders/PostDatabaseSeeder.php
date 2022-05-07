<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Core\Entities\User;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::withoutEvents(function () {
        //     Category::factory(100)->create();
        // });

        Category::withoutEvents(function () {
            Category::factory(10)->create([
                'created_by' => User::first(),
            ])->each(function ($c) {
                Post::withoutEvents(function () use ($c) {
                    Post::factory()->create([
                        'category_id' => $c->id,
                        'created_by' => User::first(),
                    ]);
                });
            });
        });
    }
}
