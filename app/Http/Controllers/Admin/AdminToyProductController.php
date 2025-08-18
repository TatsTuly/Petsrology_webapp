<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToyProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminToyProductController extends Controller
{
    public function index()
    {
        $toyProducts = ToyProduct::orderBy('created_at', 'desc')->get();
        
        $stats = [
            'total' => $toyProducts->count(),
            'active' => $toyProducts->where('is_active', true)->count(),
            'inactive' => $toyProducts->where('is_active', false)->count(),
            'total_value' => $toyProducts->sum('price')
        ];
        
        return view('admin.toy_products.index', compact('toyProducts', 'stats'));
    }

    public function create()
    {
        return view('admin.toy_products.create');
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
            'age_group' => 'required|string|in:puppy,adult,senior',
            'toy_type' => 'required|string|in:chew,interactive,plush,puzzle,training,decorative',
            'size' => 'required|string|in:small,medium,large',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'badge' => 'nullable|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'stock_quantity' => 'required|integer|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:100'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('toy_products', 'public');
            $data['image'] = $imagePath;
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicToyProductsDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'toy_products';
            if (!file_exists($publicToyProductsDir)) {
                mkdir($publicToyProductsDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }

        ToyProduct::create($data);

        return redirect()->route('admin.toy.products.index')
            ->with('success', 'Toy product created successfully!');
    }

    public function show(ToyProduct $product)
    {
        return view('admin.toy_products.show', compact('product'));
    }

    public function edit(ToyProduct $product)
    {
        return view('admin.toy_products.edit', compact('product'));
    }

    public function update(Request $request, ToyProduct $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'pet_type' => 'required|string|in:dog,cat,bird,rabbit,fish',
            'age_group' => 'required|string|in:puppy,adult,senior',
            'toy_type' => 'required|string|in:chew,interactive,plush,puzzle,training,decorative',
            'size' => 'required|string|in:small,medium,large',
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
            $imagePath = $request->file('image')->store('toy_products', 'public');
            $data['image'] = $imagePath;
            
            // For Windows compatibility, ensure public/storage directory exists
            $publicStorageDir = public_path('storage');
            if (!file_exists($publicStorageDir)) {
                mkdir($publicStorageDir, 0755, true);
            }
            
            $publicToyProductsDir = $publicStorageDir . DIRECTORY_SEPARATOR . 'toy_products';
            if (!file_exists($publicToyProductsDir)) {
                mkdir($publicToyProductsDir, 0755, true);
            }
            
            // Copy the uploaded file to public/storage as well for Windows compatibility
            $sourceFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $imagePath);
            $destFile = $publicStorageDir . DIRECTORY_SEPARATOR . $imagePath;
            if (file_exists($sourceFile)) {
                copy($sourceFile, $destFile);
            }
        }

        $product->update($data);

        return redirect()->route('admin.toy.products.index')
            ->with('success', 'Toy product updated successfully!');
    }

    public function destroy(ToyProduct $product)
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

        return redirect()->route('admin.toy.products.index')
            ->with('success', 'Toy product deleted successfully!');
    }

    public function toggleStatus(ToyProduct $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        
        $status = $product->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.toy.products.index')
            ->with('success', "Toy product {$status} successfully!");
    }
}
