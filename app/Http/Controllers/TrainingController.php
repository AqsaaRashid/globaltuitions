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
        // ORDER BY sort_order
        $categories = TrainingCategory::with('images')
            ->orderBy('sort_order')
            ->get();

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
            'name'       => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        TrainingCategory::create([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,   // 👈 added
        ]);

        return redirect()
            ->route('training.categories.index')
            ->with('success', 'Category added');
    }

    public function editCategory(TrainingCategory $category)
    {
        return view('admin.training.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, TrainingCategory $category)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $category->update([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'sort_order' => $request->sort_order ?? 0,   // 👈 added
        ]);

        return redirect()
            ->route('training.categories.index')
            ->with('success', 'Category updated');
    }

    /* ==============================
     | IMAGE CRUD
     ============================== */
    public function createImage()
    {
        // ORDER BY sort_order so dropdown matches frontend order
        $categories = TrainingCategory::orderBy('sort_order')->get();

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
        $categories = TrainingCategory::orderBy('sort_order')->get();

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

    public function categoriesIndex()
    {
        // ORDER BY sort_order
        $categories = TrainingCategory::orderBy('sort_order')->get();

        return view('admin.training.categories.index', compact('categories'));
    }

    public function destroyCategory(TrainingCategory $category)
    {
        $category->delete();

        return redirect()
            ->route('training.categories.index')
            ->with('success', 'Category deleted');
    }
}
