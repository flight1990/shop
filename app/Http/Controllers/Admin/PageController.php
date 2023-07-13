<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function index(): Response
    {
        $pages = Page::query()
            ->select(['id', 'name', 'slug'])
            ->get();

        return Inertia::render('Admin/Pages/Index', [
            'pages' => PageResource::collection($pages)
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Pages/Modify');
    }

    public function store(CreatePageRequest $request): RedirectResponse
    {
        Page::create($request->validated());
        return redirect()->route('admin.pages.index');
    }

    public function edit(int $id): Response
    {
        $page = Page::query()->findOrFail($id);

        return Inertia::render('Admin/Pages/Modify', [
            'page' => new PageResource($page)
        ]);
    }

    public function update(UpdatePageRequest $request, int $id): RedirectResponse
    {
        $page = Page::query()->findOrFail($id);
        $page->update($request->validated());

        return redirect()->route('admin.pages.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Page::query()->findOrFail($id)->delete();
        return redirect()->route('admin.pages.index');
    }
}
