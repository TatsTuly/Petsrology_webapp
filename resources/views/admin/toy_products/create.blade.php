<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Toy Product - PETSROLOGY Admin</title>
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
        .dashboard-container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .page-header { text-align: center; margin-bottom: 30px; }
        .page-title { font-size: 2.2rem; font-weight: 700; color: #2c3e50; background: linear-gradient(45deg, #2c3e50, #3498db); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 10px; }
        .page-subtitle { color: #666; font-size: 1.1rem; }
        .form-container { background: white; border-radius: 15px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border: 1px solid rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 25px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #2c3e50; font-size: 0.95rem; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px 15px; border: 2px solid #e9ecef; border-radius: 8px; font-family: 'Nunito', sans-serif; font-size: 1rem; transition: all 0.3s ease; background: #fff; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { outline: none; border-color: #3498db; box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1); }
        .form-group textarea { resize: vertical; min-height: 100px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-actions { display: flex; gap: 15px; justify-content: center; margin-top: 40px; }
        .btn { padding: 12px 30px; border: none; border-radius: 25px; font-weight: 600; cursor: pointer; font-size: 1rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; }
        .btn-primary { background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); color: white; }
        .btn-secondary { background: linear-gradient(135deg, #6c757d 0%, #495057 100%); color: white; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.2); }
        .error-message { color: #e74c3c; font-size: 0.9rem; margin-top: 5px; }
        .image-preview { margin-top: 10px; text-align: center; }
        .image-preview img { max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #e9ecef; }
        @media (max-width: 768px) { .form-row { grid-template-columns: 1fr; } .form-container { padding: 25px; } .form-actions { flex-direction: column; } .btn { width: 100%; justify-content: center; } }
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
                    <p>Add Toy Product</p>
                </div>
            </div>
            <nav class="admin-nav">
                <div class="admin-user">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ session('admin_username', 'Admin User') }}</span>
                </div>
                <a href="{{ route('admin.toy.products.index') }}" class="logout-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Toy Products
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
        <div class="page-header">
            <h1 class="page-title">Add New Toy Product</h1>
            <p class="page-subtitle">Fill in the details below to add a new toy product to your catalog</p>
        </div>
        <div class="form-container">
            <form method="POST" action="{{ route('admin.toy.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Product Title *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g., Plush Squeaky Dog Toy">
                        @error('title')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand *</label>
                        <input type="text" id="brand" name="brand" value="{{ old('brand') }}" required placeholder="e.g., PetFun, CatJoy, DoggoPlay">
                        @error('brand')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="pet_type">Pet Type *</label>
                        <select id="pet_type" name="pet_type" required>
                            <option value="">Select Pet Type</option>
                            <option value="dog" {{ old('pet_type') == 'dog' ? 'selected' : '' }}>Dog</option>
                            <option value="cat" {{ old('pet_type') == 'cat' ? 'selected' : '' }}>Cat</option>
                            <option value="bird" {{ old('pet_type') == 'bird' ? 'selected' : '' }}>Bird</option>
                            <option value="rabbit" {{ old('pet_type') == 'rabbit' ? 'selected' : '' }}>Rabbit</option>
                            <option value="fish" {{ old('pet_type') == 'fish' ? 'selected' : '' }}>Fish</option>
                        </select>
                        @error('pet_type')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age_group">Age Group *</label>
                        <select id="age_group" name="age_group" required>
                            <option value="">Select Age Group</option>
                            <option value="puppy" {{ old('age_group') == 'puppy' ? 'selected' : '' }}>Puppy/Kitten</option>
                            <option value="adult" {{ old('age_group') == 'adult' ? 'selected' : '' }}>Adult</option>
                            <option value="senior" {{ old('age_group') == 'senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                        @error('age_group')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="toy_type">Toy Type *</label>
                        <select id="toy_type" name="toy_type" required>
                            <option value="">Select Toy Type</option>
                            <option value="chew" {{ old('toy_type') == 'chew' ? 'selected' : '' }}>Chew</option>
                            <option value="interactive" {{ old('toy_type') == 'interactive' ? 'selected' : '' }}>Interactive</option>
                            <option value="plush" {{ old('toy_type') == 'plush' ? 'selected' : '' }}>Plush</option>
                            <option value="puzzle" {{ old('toy_type') == 'puzzle' ? 'selected' : '' }}>Puzzle</option>
                            <option value="training" {{ old('toy_type') == 'training' ? 'selected' : '' }}>Training</option>
                            <option value="decorative" {{ old('toy_type') == 'decorative' ? 'selected' : '' }}>Decorative</option>
                        </select>
                        @error('toy_type')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size *</label>
                        <select id="size" name="size" required>
                            <option value="">Select Size</option>
                            <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small</option>
                            <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large</option>
                        </select>
                        @error('size')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Price (৳) *</label>
                        <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required placeholder="e.g., 499">
                        @error('price')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="old_price">Old Price (৳) - Optional</label>
                        <input type="number" step="0.01" id="old_price" name="old_price" value="{{ old('old_price') }}" placeholder="e.g., 599">
                        @error('old_price')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="rating">Rating (0-5) - Optional</label>
                        <input type="number" step="0.1" min="0" max="5" id="rating" name="rating" value="{{ old('rating', 4.5) }}">
                        @error('rating')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock_quantity">Stock Quantity *</label>
                        <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', 100) }}" required>
                        @error('stock_quantity')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="badge">Badge - Optional</label>
                    <input type="text" id="badge" name="badge" value="{{ old('badge') }}" placeholder="e.g., Popular, New, Premium, etc.">
                    @error('badge')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="features">Features - Optional</label>
                    <div id="featuresContainer" class="features-input">
                        <input type="text" id="addFeatureInput" class="add-feature-input" placeholder="Type a feature and press Enter">
                    </div>
                    <input type="hidden" id="featuresInput" name="features" value="{{ old('features') }}">
                    <div id="featuresPreview" style="margin-top: 10px;"></div>
                </div>
                <div class="form-group">
                    <label for="image">Product Image - Optional</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div class="image-preview" id="imagePreview"></div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Toy Product</button>
                    <a href="{{ route('admin.toy.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                </div>
            </form>
        </div>
    </main>
    <script>
        // Image preview
        document.getElementById('image')?.addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Features management
        let features = [];
        const featuresContainer = document.getElementById('featuresContainer');
        const addFeatureInput = document.getElementById('addFeatureInput');
        const featuresInput = document.getElementById('featuresInput');
        const featuresPreview = document.getElementById('featuresPreview');

        addFeatureInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const feature = this.value.trim();
                if (feature && !features.includes(feature)) {
                    addFeature(feature);
                    this.value = '';
                }
            }
        });

        function addFeature(feature) {
            features.push(feature);
            updateFeaturesDisplay();
            updateFeaturesInput();
        }

        function removeFeature(feature) {
            features = features.filter(f => f !== feature);
            updateFeaturesDisplay();
            updateFeaturesInput();
        }

        function updateFeaturesDisplay() {
            if (features.length === 0) {
                featuresPreview.innerHTML = '<p class="text-muted">No features added yet</p>';
                return;
            }
            featuresPreview.innerHTML = features.map(feature =>
                `<span class="feature-tag">${feature} <button type="button" class="remove-feature" onclick="removeFeature('${feature.replace(/'/g, "\\'")}')">&times;</button></span>`
            ).join(' ');
        }

        function updateFeaturesInput() {
            featuresInput.value = JSON.stringify(features);
        }

        // Initialize features display
        updateFeaturesDisplay();
    </script>
</body>
</html>
