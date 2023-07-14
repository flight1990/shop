<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::query()
            ->select(['id', 'name', 'slug', 'category_id', 'price', 'discount_price'])
            ->with(['category:id,name,slug'])
            ->get();

        return Inertia::render('Admin/Products/Index', [
            'products' => ProductResource::collection($products)
        ]);
    }

    public function create(): Response
    {
        $productCategories = Category::query()
            ->select(['id', 'name'])
            ->get();

        return Inertia::render('Admin/Products/Modify', [
            'productCategories' => CategoryResource::collection($productCategories)
        ]);
    }

    public function store(CreateProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('admin.products.index');
    }

    public function edit(int $id): Response
    {
        $product = Product::query()->findOrFail($id);

        $productCategories = Category::query()
            ->select(['id', 'name'])
            ->get();

        return Inertia::render('Admin/Products/Modify', [
            'product' => new ProductResource($product),
            'productCategories' => CategoryResource::collection($productCategories)
        ]);
    }

    public function update(UpdateProductRequest $request, int $id): RedirectResponse
    {
        $product = Product::query()->firstOrFail($id);
        $product->update($request->validated());

        return redirect()->route('admin.products.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Product::query()->firstOrFail($id)->delete();

        return redirect()->route('admin.products.index');
    }
}
