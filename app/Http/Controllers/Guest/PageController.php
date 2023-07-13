<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Guest/Pages/Index');
    }

    public function show(string $slug): Response
    {
        $page = Page::query()
            ->select(['name', 'body'])
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Guest/Pages/Show', [
            'page' => new PageResource($page)
        ]);
    }
}
