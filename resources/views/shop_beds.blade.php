@extends('layouts.app')

@section('title', 'Shop Beds - PETSROLOGY')

@section('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
        }
        .header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: #fff;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 2px 10px rgba(255,111,97,0.1);
        }
        .header h1 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .header p {
            font-size: 1.1rem;
            margin: 10px 0 0;
            opacity: 0.9;
        }
        .beds-section {
            max-width: 1000px;
            margin: -40px auto 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 38px 32px 32px 32px;
        }
        .beds-title {
            color: #ff6f61;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 18px;
            text-align: center;
        }
        .beds-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
            margin-bottom: 30px;
        }
        .bed-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(255,111,97,0.08);
            padding: 22px 18px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
            border: 2px solid transparent;
        }
        .bed-card:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-5px) scale(1.03);
        }
        .bed-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
            background: #f3f3f3;
        }
        .bed-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: #333;
        }
        .bed-desc {
            color: #666;
            font-size: 0.98rem;
            margin-bottom: 10px;
        }
        .bed-price {
            color: #ff6f61;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        .bed-badge {
            display: inline-block;
            background: #ff9472;
            color: #fff;
            font-size: 0.85rem;
            border-radius: 12px;
            padding: 2px 10px;
            margin-bottom: 8px;
        }
        .bed-rating {
            color: #f7b731;
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .bed-stock {
            color: #28a745;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        @media (max-width: 900px) {
            .beds-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (max-width: 600px) {
            .beds-section {
                padding: 18px 4vw 18px 4vw;
            }
            .beds-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="header">
        <h1>Shop Beds & Comfort</h1>
        <p>Soft, cozy, and stylish beds for your beloved pets. Give them the comfort they deserve!</p>
    </div>
    <div class="beds-section">
        <div class="beds-title">Pet Beds & Comfort Items</div>
        <div class="beds-grid">
            <!-- Example Bed Product 1 -->
            <div class="bed-card">
                <img src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=400&q=80" class="bed-image" alt="Plush Dog Bed">
                <div class="bed-title">Plush Dog Bed</div>
                <div class="bed-badge">Best Seller</div>
                <div class="bed-desc">Ultra-soft, machine-washable bed for dogs of all sizes. Non-slip bottom for safety.</div>
                <div class="bed-price">৳ 1,200</div>
                <div class="bed-rating">★★★★☆ (4.7)</div>
                <div class="bed-stock">In Stock</div>
            <div class="bed-actions" style="margin-top:12px;">
                <button class="add-to-cart" style="background:linear-gradient(90deg,#ff6f61 60%,#ff9472 100%);color:#fff;padding:8px 20px;border:none;border-radius:20px;font-weight:600;cursor:pointer;transition:background 0.2s;">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
            </div>
            <!-- Example Bed Product 2 -->
            <div class="bed-card">
                <img src="https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?auto=format&fit=crop&w=400&q=80" class="bed-image" alt="Plush Cat Bed">
                <div class="bed-title">Plush Cat Bed</div>
                <div class="bed-badge">New Arrival</div>
                <div class="bed-desc">Cozy, round bed for cats and small pets. Raised rim for head and neck support.</div>
                <div class="bed-price">৳ 950</div>
                <div class="bed-rating">★★★★★ (4.9)</div>
                <div class="bed-stock">In Stock</div>
                            <div class="bed-actions" style="margin-top:12px;">
                <button class="add-to-cart" style="background:linear-gradient(90deg,#ff6f61 60%,#ff9472 100%);color:#fff;padding:8px 20px;border:none;border-radius:20px;font-weight:600;cursor:pointer;transition:background 0.2s;">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
            </div>
            <!-- Example Bed Product 3 -->
            <div class="bed-card">
                <img src="https://images.unsplash.com/photo-1573682127988-f67136e7f12a?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBldCUyMGJlZHxlbnwwfHwwfHx8MA%3D%3D" class="bed-image" alt="Orthopedic Pet Bed">
                <div class="bed-title">Orthopedic Pet Bed</div>
                <div class="bed-badge">Premium</div>
                <div class="bed-desc">Memory foam support for senior pets and those with joint pain. Removable cover.</div>
                <div class="bed-price">৳ 2,100</div>
                <div class="bed-rating">★★★★☆ (4.8)</div>
                <div class="bed-stock">Limited Stock</div>
            <div class="bed-actions" style="margin-top:12px;">
                <button class="add-to-cart" style="background:linear-gradient(90deg,#ff6f61 60%,#ff9472 100%);color:#fff;padding:8px 20px;border:none;border-radius:20px;font-weight:600;cursor:pointer;transition:background 0.2s;">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
@section('scripts')
<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const originalContent = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check"></i> Added!';
            this.style.background = '#28a745';
            setTimeout(() => {
                this.innerHTML = originalContent;
                this.style.background = '';
            }, 2000);
        });
    });
</script>
@endsection
            </div>
            <!-- Example Bed Product 4 -->
            <div class="bed-card">
                <img src="https://images.unsplash.com/photo-1687667326854-8475631c2652?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTV8fHJhYmJpdCUyMGhpZG91dCUyMGJlZHxlbnwwfHwwfHx8MA%3D%3D" class="bed-image" alt="Rabbit Hideout Bed">
                <div class="bed-title">Rabbit Hideout Bed</div>
                <div class="bed-badge">Popular</div>
                <div class="bed-desc">Soft, cave-style bed for rabbits and small pets. Provides warmth and security.</div>
                <div class="bed-price">৳ 800</div>
                <div class="bed-rating">★★★★☆ (4.6)</div>
                <div class="bed-stock">In Stock</div>
                <div class="bed-actions" style="margin-top:12px;">
                <button class="add-to-cart" style="background:linear-gradient(90deg,#ff6f61 60%,#ff9472 100%);color:#fff;padding:8px 20px;border:none;border-radius:20px;font-weight:600;cursor:pointer;transition:background 0.2s;">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
            </div>
        </div>
        <div style="text-align:center;margin-top:24px;color:#888;font-size:1rem;">
            Looking for something special? <a href="mailto:support@petsrology.com" style="color:#ff6f61;text-decoration:underline;">Contact us</a> for custom bed orders!
        </div>
    </div>
@endsection

