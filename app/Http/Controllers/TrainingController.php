<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCategory;
use App\Models\TrainingImage;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    /* ==============================
     | INDEX
     ============================== */
    public function index()
    {
        $categories = TrainingCategory::with('images')->get();
        return view('admin.training.index', compact('categories'));
    }

    /* ==============================
     | CATEGORY CRUD
     ============================== */
    public function createCategory()
    {
        return view('admin.training.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TrainingCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('training.index')
            ->with('success', 'Category added');
    }

    public function editCategory(TrainingCategory $category)
    {
        return view('admin.training.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, TrainingCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('training.index')
            ->with('success', 'Category updated');
    }

    /* ==============================
     | IMAGE CRUD
     ============================== */
    public function createImage()
    {
        $categories = TrainingCategory::all();
        return view('admin.training.images.create', compact('categories'));
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:training_categories,id',
            'image'       => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        TrainingImage::create([
            'training_category_id' => $request->category_id,
            'image'                => $imageName,
        ]);

        return redirect()
            ->route('training.index')
            ->with('success', 'Image added');
    }

    public function editImage(TrainingImage $image)
    {
        $categories = TrainingCategory::all();
        return view('admin.training.images.edit', compact('image', 'categories'));
    }

    public function updateImage(Request $request, TrainingImage $image)
    {
        $request->validate([
            'category_id' => 'required|exists:training_categories,id',
            'image'       => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $imageName = $image->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $image->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $image->update([
            'training_category_id' => $request->category_id,
            'image'                => $imageName,
        ]);

        return redirect()
            ->route('training.index')
            ->with('success', 'Image updated');
    }

    public function destroyImage(TrainingImage $image)
    {
        $imagePath = public_path('images/' . $image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return back()->with('success', 'Image deleted');
    }
}
