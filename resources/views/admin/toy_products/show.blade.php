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
        color: #e67e22;
        font-weight: 800;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .detail-box {
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px solid #e9ecef;
        box-shadow: 0 1px 4px rgba(230,126,34,0.04);
        padding: 16px 18px 10px 18px;
        margin-bottom: 16px;
    }
    .detail-label {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 7px;
        display: block;
        font-size: 1.08rem;
    }
    .detail-value {
        font-size: 1.08rem;
        color: #333;
    }
    .product-image-preview {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #e9ecef;
        margin-bottom: 10px;
        background: #f8f9fa;
        box-shadow: 0 2px 8px rgba(230,126,34,0.08);
    }
    .actions {
        text-align: right;
        margin-top: 18px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
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
        background: linear-gradient(135deg, #d35400 0%, #e67e22 100%);
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
</style>
@endsection
@extends('layouts.app')

@section('title', 'Toy Product Details')

@section('content')
<div class="container">
    <h2><i class="fas fa-paw"></i> Toy Product Details</h2>
    @if(isset($product))
        <div style="display: flex; gap: 30px; align-items: flex-start; flex-wrap: wrap; margin-bottom: 24px;">
            <div>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product-image-preview">
                @else
                    <img src="https://via.placeholder.com/140x140?text=No+Image" alt="No Image" class="product-image-preview">
                @endif
            </div>
            <div style="flex: 1;">
                <div class="detail-box">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $product->title }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Brand</span>
                    <span class="detail-value">{{ $product->brand }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Pet Type</span>
                    <span class="detail-value">{{ $product->pet_type }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Age Group</span>
                    <span class="detail-value">{{ $product->age_group }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Toy Type</span>
                    <span class="detail-value">{{ $product->toy_type }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Size</span>
                    <span class="detail-value">{{ $product->size }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Weight</span>
                    <span class="detail-value">{{ $product->weight }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Stock Quantity</span>
                    <span class="detail-value">{{ $product->stock_quantity }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">{{ $product->is_active ? 'Active' : 'Inactive' }}</span>
                </div>
                <div class="detail-box">
                    <span class="detail-label">Price</span>
                    <span class="detail-value">৳{{ number_format($product->price, 0) }}
                        @if($product->old_price)
                            <span style="text-decoration: line-through; color: #999; font-size: 1rem; margin-left: 8px;">৳{{ number_format($product->old_price, 0) }}</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="detail-box">
            <span class="detail-label">Description</span>
            <span class="detail-value">{{ $product->description }}</span>
        </div>
        <div class="actions">
            <a href="{{ route('admin.supply.management') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('admin.toy.products.edit', $product) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    @else
        <div style="text-align: center; color: #e74c3c; font-weight: 700;">Product not found.</div>
    @endif
</div>
@endsection
