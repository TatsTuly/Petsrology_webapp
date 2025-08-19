@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: #333;
        margin: 0;
        min-height: 100vh;
    }
    .container {
        max-width: 700px;
        margin: 40px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(44,62,80,0.08);
        padding: 40px 30px;
    }
    h2 {
        color: #3498db;
        font-weight: 800;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-group {
        margin-bottom: 22px;
    }
    label {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 7px;
        display: block;
        font-size: 1.08rem;
    }
    input, select, textarea {
        width: 100%;
        padding: 16px 18px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        font-family: 'Nunito', sans-serif;
        font-size: 1.08rem;
        background: #f8f9fa;
        box-shadow: 0 1px 4px rgba(52,152,219,0.04);
        margin-bottom: 0;
        transition: border 0.3s, box-shadow 0.3s;
    }
    input:focus, select:focus, textarea:focus {
        border-color: #3498db;
        outline: none;
        background: #eaf6fb;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.08);
    }
    .form-actions {
        text-align: right;
        margin-top: 18px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: #fff;
        border: none;
        border-radius: 25px;
        padding: 12px 28px;
        font-weight: 700;
        font-size: 1.08rem;
        cursor: pointer;
        margin-left: 8px;
        transition: background 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #2980b9 0%, #3498db 100%);
    }
    .btn-secondary {
        background: #eee;
        color: #333;
        border-radius: 25px;
        padding: 12px 28px;
        font-weight: 700;
        font-size: 1.08rem;
        border: none;
        cursor: pointer;
        margin-left: 8px;
        transition: background 0.2s, color 0.2s;
    }
    .btn-secondary:hover {
        background: #e9ecef;
        color: #222;
    }
    .product-image-preview {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #e9ecef;
        margin-bottom: 10px;
        background: #f8f9fa;
        box-shadow: 0 2px 8px rgba(52,152,219,0.08);
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection
@extends('layouts.app')

@section('title', 'Edit Toy Product')

@section('content')
<div class="container">
    <h2><i class="fas fa-edit"></i> Edit Toy Product</h2>
    @if(isset($product))
    <form method="POST" action="{{ route('admin.toy.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group" style="text-align:center;">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product-image-preview">
            @else
                <img src="https://via.placeholder.com/140x140?text=No+Image" alt="No Image" class="product-image-preview">
            @endif
            <input type="file" name="image" accept="image/*" style="margin-top: 8px; display:block; margin-left:auto; margin-right:auto;">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $product->title) }}" required>
        </div>
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" required>
        </div>
        <div class="form-group">
            <label>Pet Type</label>
            <input type="text" name="pet_type" value="{{ old('pet_type', $product->pet_type) }}" required>
        </div>
        <div class="form-group">
            <label>Age Group</label>
            <input type="text" name="age_group" value="{{ old('age_group', $product->age_group) }}" required>
        </div>
        <div class="form-group">
            <label>Toy Type</label>
            <input type="text" name="toy_type" value="{{ old('toy_type', $product->toy_type) }}" required>
        </div>
        <div class="form-group">
            <label>Size</label>
            <input type="text" name="size" value="{{ old('size', $product->size) }}" required>
        </div>
        <div class="form-group">
            <label>Weight</label>
            <input type="text" name="weight" value="{{ old('weight', $product->weight) }}" required>
        </div>
        <div class="form-group">
            <label>Stock Quantity</label>
            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="1" @if($product->is_active) selected @endif>Active</option>
                <option value="0" @if(!$product->is_active) selected @endif>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="form-group">
            <label>Old Price</label>
            <input type="number" name="old_price" value="{{ old('old_price', $product->old_price) }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.supply.management') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
    @else
        <div style="text-align: center; color: #e74c3c; font-weight: 700;">Product not found.</div>
    @endif
</div>
@endsection
