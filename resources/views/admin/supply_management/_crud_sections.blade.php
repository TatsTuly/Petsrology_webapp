
<div class="crud-section" id="food-products-section" style="display: none;">
    <style>
        .products-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .table-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .table-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }
        .add-product-btn {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        .add-product-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        td {
            color: #333;
        }
        .product-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }
        .product-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .product-brand {
            color: #666;
            font-size: 0.9rem;
        }
        .price {
            font-weight: 700;
            color: #27ae60;
        }
        .old-price {
            text-decoration: line-through;
            color: #999;
            margin-left: 5px;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        .btn-view { background: #3498db; color: white; }
        .btn-edit { background: #f39c12; color: white; }
        .btn-delete { background: #e74c3c; color: white; }
        .btn-toggle { background: #6c757d; color: white; }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }
        .empty-state h3 {
            margin-bottom: 10px;
            color: #333;
        }
    </style>
    <div class="products-table">
        <div class="table-header">
            <h3 class="table-title">All Food Products</h3>
            <a href="{{ route('admin.food.products.create') }}" class="add-product-btn" style="float:right; margin-top:-35px;">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
        <div class="table-container">
            @if($foodProducts->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Details</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foodProducts as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product-image">
                                    @else
                                        <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image" class="product-image">
                                    @endif
                                </td>
                                <td>
                                    <div class="product-title">{{ $product->title }}</div>
                                    <div class="product-brand">{{ $product->brand }}</div>
                                    <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">
                                        {{ Str::limit($product->description, 60) }}
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: #2c3e50;">{{ ucfirst($product->pet_type) }}</div>
                                    <div style="font-size: 0.8rem; color: #666;">{{ ucfirst($product->age_group) }} • {{ ucfirst($product->food_type) }}</div>
                                    <div style="font-size: 0.8rem; color: #666;">{{ $product->weight }}</div>
                                </td>
                                <td>
                                    <span class="price">৳{{ number_format($product->price, 0) }}</span>
                                    @if($product->old_price)
                                        <span class="old-price">৳{{ number_format($product->old_price, 0) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span style="font-weight: 600; color: {{ $product->stock_quantity > 20 ? '#27ae60' : ($product->stock_quantity > 0 ? '#f39c12' : '#e74c3c') }};">
                                        {{ $product->stock_quantity }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.food.products.show', $product) }}" class="btn btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.food.products.edit', $product) }}" class="btn btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.food.products.toggle-status', $product) }}" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-toggle">
                                                <i class="fas fa-{{ $product->is_active ? 'pause' : 'play' }}"></i>
                                                {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.food.products.destroy', $product) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>No Food Products Found</h3>
                    <p>Start by adding your first food product to the catalog.</p>
                    <a href="{{ route('admin.food.products.create') }}" class="add-product-btn" style="margin-top: 20px;">
                        <i class="fas fa-plus"></i>
                        Add First Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="crud-section" id="toy-products-section" style="display: none;">
    <div class="products-table">
        <div class="table-header">
            <h3 class="table-title">All Toy Products</h3>
            <a href="{{ route('admin.toy.products.create') }}" class="add-product-btn" style="float:right; margin-top:-35px;">
                <i class="fas fa-plus"></i> Add New Toy Product
            </a>
        </div>
        <div class="table-container">
            @if($toyProducts->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Details</th>
                            <th>Category Info</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toyProducts as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        @if(Str::startsWith($product->image, 'http'))
                                            <img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-image">
                                        @else
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product-image">
                                        @endif
                                    @else
                                        <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image" class="product-image">
                                    @endif
                                </td>
                                <td>
                                    <div class="product-title">{{ $product->title }}</div>
                                    <div class="product-brand">{{ $product->brand }}</div>
                                    <div style="font-size: 0.8rem; color: #666; margin-top: 5px;">
                                        {{ Str::limit($product->description, 60) }}
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: #2c3e50;">{{ ucfirst($product->pet_type) }}</div>
                                    <div style="font-size: 0.8rem; color: #666;">{{ ucfirst($product->age_group) }} • {{ ucfirst($product->toy_type) }} • {{ ucfirst($product->size) }}</div>
                                </td>
                                <td>
                                    <span class="price">৳{{ number_format($product->price, 0) }}</span>
                                    @if($product->old_price)
                                        <span class="old-price">৳{{ number_format($product->old_price, 0) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span style="font-weight: 600; color: {{ $product->stock_quantity > 20 ? '#27ae60' : ($product->stock_quantity > 0 ? '#f39c12' : '#e74c3c') }};">
                                        {{ $product->stock_quantity }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.toy.products.show', $product) }}" class="btn btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.toy.products.edit', $product) }}" class="btn btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.toy.products.toggle-status', $product) }}" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-toggle">
                                                <i class="fas fa-{{ $product->is_active ? 'pause' : 'play' }}"></i>
                                                {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.toy.products.destroy', $product) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>No Toy Products Found</h3>
                    <p>Start by adding your first toy product to the catalog.</p>
                    <a href="{{ route('admin.toy.products.create') }}" class="add-product-btn" style="margin-top: 20px;">
                        <i class="fas fa-plus"></i>
                        Add First Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
