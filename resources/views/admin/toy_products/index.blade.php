
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Products Management - PETSROLOGY Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background: #f8f9fa; color: #333; line-height: 1.6; }
        .admin-header { background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); color: white; padding: 20px 0; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .admin-brand { display: flex; align-items: center; gap: 15px; }
        .admin-logo { width: 40px; height: 40px; background: rgba(255,255,255,0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .brand-text h1 { font-size: 1.8rem; font-weight: 700; margin: 0; }
        .brand-text p { margin: 0; opacity: 0.9; font-size: 0.9rem; }
        .admin-nav { display: flex; align-items: center; gap: 20px; }
        .admin-user { display: flex; align-items: center; gap: 8px; font-weight: 600; }
        .logout-btn { background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.3); padding: 10px 20px; border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease; text-decoration: none; }
        .logout-btn:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
        .dashboard-container { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .page-title { font-size: 2.2rem; font-weight: 700; color: #2c3e50; background: linear-gradient(45deg, #2c3e50, #3498db); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .add-product-btn { background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); color: white; padding: 12px 25px; border: none; border-radius: 25px; font-weight: 600; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; }
        .add-product-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3); }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); text-align: center; border: 1px solid rgba(0,0,0,0.05); }
        .stat-icon { width: 60px; height: 60px; background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: white; font-size: 1.5rem; }
        .stat-number { font-size: 2rem; font-weight: 700; color: #2c3e50; margin-bottom: 5px; }
        .stat-label { color: #666; font-weight: 600; }
        .products-table { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border: 1px solid rgba(0,0,0,0.05); }
        .table-header { background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px; border-bottom: 1px solid #dee2e6; }
        .table-title { font-size: 1.3rem; font-weight: 700; color: #2c3e50; margin: 0; }
        .table-container { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px 20px; text-align: left; border-bottom: 1px solid #dee2e6; }
        th { background: #f8f9fa; font-weight: 600; color: #495057; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }
        td { color: #333; }
        .product-image { width: 60px; height: 60px; border-radius: 8px; object-fit: cover; }
        .product-title { font-weight: 600; color: #2c3e50; margin-bottom: 5px; }
        .product-brand { color: #666; font-size: 0.9rem; }
        .price { font-weight: 700; color: #27ae60; }
        .old-price { text-decoration: line-through; color: #999; margin-left: 5px; }
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; }
        .status-active { background: #d4edda; color: #155724; }
        .status-inactive { background: #f8d7da; color: #721c24; }
        .action-buttons { display: flex; gap: 8px; }
        .btn { padding: 8px 12px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.8rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; transition: all 0.3s ease; }
        .btn-view { background: #3498db; color: white; }
        .btn-edit { background: #f39c12; color: white; }
        .btn-delete { background: #e74c3c; color: white; }
        .btn-toggle { background: #6c757d; color: white; }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .empty-state { text-align: center; padding: 60px 20px; color: #666; }
        .empty-state i { font-size: 4rem; color: #ddd; margin-bottom: 20px; }
        .empty-state h3 { margin-bottom: 10px; color: #333; }
        .success-message { background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb; }
        @media (max-width: 768px) { .header-container { flex-direction: column; gap: 15px; } .page-header { flex-direction: column; gap: 15px; text-align: center; } .stats-grid { grid-template-columns: 1fr; } .table-container { overflow-x: scroll; } th, td { padding: 10px 15px; font-size: 0.9rem; } }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <p>Toy Products Management</p>
                </div>
            </div>
            <nav class="admin-nav">
                <div class="admin-user">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ session('admin_username', 'Admin User') }}</span>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="logout-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>
    <main class="dashboard-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div class="page-header">
            <h1 class="page-title">Toy Products Management</h1>
            <a href="{{ route('admin.toy.products.create') }}" class="add-product-btn">
                <i class="fas fa-plus"></i>
                Add New Toy Product
            </a>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-number">{{ $toyProducts->count() }}</div>
                <div class="stat-label">Total Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-number">{{ $toyProducts->where('is_active', true)->count() }}</div>
                <div class="stat-label">Active Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-number">{{ $toyProducts->where('is_active', false)->count() }}</div>
                <div class="stat-label">Inactive Products</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-number">৳{{ number_format($toyProducts->sum('price'), 0) }}</div>
                <div class="stat-label">Total Value</div>
            </div>
        </div>
        <div class="products-table">
            <div class="table-header">
                <h3 class="table-title">All Toy Products</h3>
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
                                            <div style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                                                <i class="fas fa-image"></i>
                                            </div>
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
    </main>
</body>
</html>
