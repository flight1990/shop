<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        $categories = Category::query()
            ->select(['id', 'name', 'slug', '_lft', '_rgt', 'parent_id'])
            ->with(['parent:id,name'])
            ->get();

        return Inertia::render('Admin/Categories/Index', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function create(): Response
    {
        $parentCategories = Category::query()
            ->select(['id', 'name'])
            ->whereNull('parent_id')
            ->get();

        return Inertia::render('Admin/Categories/Modify', [
            'parentCategories' => CategoryResource::collection($parentCategories)
        ]);
    }

    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return redirect()->route('admin.categories.index');
    }

    public function edit(int $id): Response
    {
        $category = Category::query()->findOrFail($id);

        $parentCategories = Category::query()
            ->select(['id', 'name'])
            ->whereNull('parent_id')
            ->where('id', '!=', $id)
            ->get();

        return Inertia::render('Admin/Categories/Modify', [
            'category' => new CategoryResource($category),
            'parentCategories' => CategoryResource::collection($parentCategories)
        ]);
    }

    public function update(UpdateCategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->validated());

        return redirect()->route('admin.categories.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Category::query()->findOrFail($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
