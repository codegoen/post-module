<?php

use Modules\Post\Entities\Category;

uses(Tests\TestCase::class);

beforeEach(function () {
    actingAsGeneralUser();
});

it('has category json', function () {
    Category::factory()->create([
        'name' => 'test-name',
    ]);

    $res = $this->getJson(url("/api/v1/categories"));
    expect($res)->toBeObject();
});
