<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin_views.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin_views.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'image_url' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin_views.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,'.$category->id.'|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $category->image_url;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image_url) {
                Storage::disk('public')->delete($category->image_url);
            }
            // Store new image
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'image_url' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        // Delete the image from storage
        if ($category->image_url) {
            Storage::disk('public')->delete($category->image_url);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
