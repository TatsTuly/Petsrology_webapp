<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFoodProductController extends Controller
{
    public function index()
    {
        $products = FoodProduct::orderBy('created_at', 'desc')->get();
        return view('admin.food_products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.food_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'pet_type' => 'required|string|in:dog,cat,bird,rabbit,fish',
            'pet_type' => 'required|string|in:dog,cat,bird,rabbit,fish',
            'age_group' => 'required|string|in:puppy,adult,senior',
            'food_type' => 'required|string|in:dry,wet,treats,raw',
            'weight' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'badge' => 'nullable|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'stock_quantity' => 'required|integer|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:100'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_products', 'public');
            $data['image'] = $imagePath;
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicFoodProductsDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'food_products';
            if (!file_exists($publicFoodProductsDir)) {
                mkdir($publicFoodProductsDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }

        FoodProduct::create($data);

        return redirect()->route('admin.food.products.index')
            ->with('success', 'Food product created successfully!');
    }

    public function show(FoodProduct $product)
    {
        return view('admin.food_products.show', compact('product'));
    }

    public function edit(FoodProduct $product)
    {
        return view('admin.food_products.edit', compact('product'));
    }

    public function update(Request $request, FoodProduct $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'pet_type' => 'required|string|in:dog,cat,bird,rabbit,fish',
            'age_group' => 'required|string|in:puppy,adult,senior',
            'food_type' => 'required|string|in:dry,wet,treats,raw',
            'weight' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'badge' => 'nullable|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'stock_quantity' => 'required|integer|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:100'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
                // Also delete from public/storage if exists
                $publicStoragePath = public_path('storage/' . $product->image);
                if (file_exists($publicStoragePath)) {
                    unlink($publicStoragePath);
                }
            }
            $imagePath = $request->file('image')->store('food_products', 'public');
            $data['image'] = $imagePath;
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicFoodProductsDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'food_products';
            if (!file_exists($publicFoodProductsDir)) {
                mkdir($publicFoodProductsDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }

        $product->update($data);

        return redirect()->route('admin.food.products.index')
            ->with('success', 'Food product updated successfully!');
    }

    public function destroy(FoodProduct $product)
    {
        // Delete image if exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
            // Also delete from public/storage if exists
            $publicStoragePath = public_path('storage/' . $product->image);
            if (file_exists($publicStoragePath)) {
                unlink($publicStoragePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.food.products.index')
            ->with('success', 'Food product deleted successfully!');
    }

    public function toggleStatus(FoodProduct $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        
        $status = $product->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.food.products.index')
            ->with('success', "Food product {$status} successfully!");
    }
}
