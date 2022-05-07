<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\Post\Datatable\SubscriberDatatable;

class SubscriberController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Post::subscriber/index')->inertable(new SubscriberDatatable)->title(__('List of Subscribers'));
    }
}
