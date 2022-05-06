<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\User\Entities\User;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Category::factory(10)->create([
            'created_by' => User::first(),
        ])->each(function ($c) {
            Post::factory()->cretae([
                'category_id' => $c->id,
                'created_by' => User::first(),
            ]);
        });
    }
}
