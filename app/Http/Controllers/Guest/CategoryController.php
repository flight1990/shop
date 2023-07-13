<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Guest/Categories/Index');
    }

    public function show(string $slug): Response
    {
        $category = Category::query()
            ->select(['id', 'name', '_lft', '_rgt', 'parent_id'])
            ->where('slug', $slug)
            ->firstOrFail();

        return Inertia::render('Guest/Categories/Show', [
            'category' => new CategoryResource($category)
        ]);
    }
}
