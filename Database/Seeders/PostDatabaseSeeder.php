<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Modules\Core\Entities\User;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\Category;
use Illuminate\Database\Eloquent\Model;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Politics', 'Congress', 'Bussines', 'Economy', 'Investment'];

        Category::withoutEvents(function () use ($categories) {
            collect($categories)->each(function ($value) {
                Category::create([
                    'id' => Str::uuid(),
                    'name' => $value,
                    'created_by' => User::first(),
                ]);
            });
        });

        Category::all()->each(function ($c) {
            Post::withoutEvents(function () use ($c) {
                Post::factory()->create([
                    'category_id' => $c->id,
                    'created_by' => User::first(),
                ]);
            });
        });
    }
}
