
<div class="crud-section" id="food-products-section" style="display: none;">
    <style>
        .products-table {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 30px;
            position: relative;
        }
        
        .products-table::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #27ae60, #229954);
        }
        
        .table-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px 30px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .add-product-btn {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(39, 174, 96, 0.3);
        }
        
        .add-product-btn:hover {
            background: linear-gradient(135deg, #229954 0%, #1e7e44 100%);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 18px 20px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        
        th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
        }
        
        td {
            color: #333;
            font-size: 0.95rem;
        }
        
        tbody tr {
            transition: all 0.2s ease;
        }
        
        tbody tr:hover {
            background: rgba(52, 152, 219, 0.05);
        }
        
        .product-image {
            width: 65px;
            height: 65px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .product-image:hover {
            transform: scale(1.1);
        }
        
        .product-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 1rem;
        }
        
        .product-brand {
            color: #7f8c8d;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .price {
            font-weight: 800;
            color: #27ae60;
            font-size: 1.1rem;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #95a5a6;
            margin-left: 8px;
            font-size: 0.9rem;
        }
        .status-badge {
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            letter-spacing: 0.5px;
        }
        
        .status-active {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            box-shadow: 0 2px 8px rgba(39, 174, 96, 0.2);
        }
        
        .status-inactive {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.2);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 10px 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .btn-view { 
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); 
            color: white; 
        }
        
        .btn-edit { 
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); 
            color: white; 
        }
        
        .btn-delete { 
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); 
            color: white; 
        }
        
        .btn-toggle { 
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%); 
            color: white; 
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #7f8c8d;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .empty-state i {
            font-size: 4.5rem;
            color: #bdc3c7;
            margin-bottom: 25px;
        }
        
        .empty-state h3 {
            margin-bottom: 15px;
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: #5a6c7d;
        }
    </style>
    
    <div class="products-table">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-bone" style="color: #27ae60;"></i>
                All Food Products
            </h3>
            <a href="{{ route('admin.food.products.create') }}" class="add-product-btn">
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
                                        <img src="{{ $product->getImageUrl() }}" alt="{{ $product->title }}" class="product-image">
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
                    <i class="fas fa-bone"></i>
                    <h3>No Food Products Found</h3>
                    <p>Start building your pet food catalog by adding your first product.</p>
                    <a href="{{ route('admin.food.products.create') }}" class="add-product-btn">
                        <i class="fas fa-plus"></i>
                        Add First Food Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="crud-section" id="toy-products-section" style="display: none;">
    <div class="products-table">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-gamepad" style="color: #3498db;"></i>
                All Toy Products
            </h3>
            <a href="{{ route('admin.toy.products.create') }}" class="add-product-btn" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
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
                                            <img src="{{ $product->getImageUrl() }}" alt="{{ $product->title }}" class="product-image">
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
                    <i class="fas fa-gamepad"></i>
                    <h3>No Toy Products Found</h3>
                    <p>Start building your pet toy catalog by adding your first product.</p>
                    <a href="{{ route('admin.toy.products.create') }}" class="add-product-btn" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
                        <i class="fas fa-plus"></i>
                        Add First Toy Product
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
