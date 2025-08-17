<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodProduct;

class FoodProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'title' => 'Adult Dog Food - Chicken & Rice',
                'brand' => 'Royal Canin',
                'description' => 'Complete nutrition for adult dogs with high-quality protein and essential nutrients.',
                'price' => 850.00,
                'old_price' => 950.00,
                'pet_type' => 'dog',
                'age_group' => 'adult',
                'food_type' => 'dry',
                'weight' => '2kg',
                'image' => 'https://shop.royalcanin.ca/cdn/shop/products/n5ue7pedongc7yiawvq0.jpg?v=1609254626&width=1500',
                'badge' => 'Popular',
                'rating' => 4.8,
                'stock_quantity' => 50,

            ],
            [
                'title' => 'Cat Food - Tuna in Gravy',
                'brand' => 'Whiskas',
                'description' => 'Delicious wet food with real tuna pieces in savory gravy, perfect for adult cats.',
                'price' => 450.00,
                'old_price' => null,
                'pet_type' => 'cat',
                'age_group' => 'adult',
                'food_type' => 'wet',
                'weight' => '400g',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqvJIF9kBdHPQT5CoA69Z2zq1pBoHnfqgKkw&s',
                'badge' => 'New',
                'rating' => 4.6,
                'stock_quantity' => 75,

            ],
            [
                'title' => 'Puppy Food - Chicken & Milk',
                'brand' => 'Pedigree',
                'description' => 'Specially formulated for growing puppies with calcium and DHA for healthy development.',
                'price' => 1200.00,
                'old_price' => 1350.00,
                'pet_type' => 'dog',
                'age_group' => 'puppy',
                'food_type' => 'dry',
                'weight' => '3kg',
                'image' => 'https://m.media-amazon.com/images/I/81HfEtQtIDL._UF1000,1000_QL80_.jpg',
                'badge' => 'Premium',
                'rating' => 4.7,
                'stock_quantity' => 40,

            ],
            [
                'title' => 'Bird Seed Mix - Premium Blend',
                'brand' => 'Vitakraft',
                'description' => 'Natural seed mix with sunflower seeds, millet, and dried fruits for all bird types.',
                'price' => 320.00,
                'old_price' => null,
                'pet_type' => 'bird',
                'age_group' => 'adult',
                'food_type' => 'treats',
                'weight' => '500g',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbwYG54uIkxneJ3nyqOfPmkcHBO6W1AB7K8Q&s',
                'badge' => 'Organic',
                'rating' => 4.5,
                'stock_quantity' => 60,

            ],
            [
                'title' => 'Senior Cat Food - Chicken',
                'brand' => 'Hill\'s Science Diet',
                'description' => 'Specially formulated for senior cats with easy-to-digest ingredients and joint support.',
                'price' => 950.00,
                'old_price' => 1100.00,
                'pet_type' => 'cat',
                'age_group' => 'senior',
                'food_type' => 'dry',
                'weight' => '1.5kg',
                'image' => 'https://pxmshare.colgatepalmolive.com/JPEG_1500/R1smRgNvhXECmYV_qdHdo.jpg',
                'badge' => 'Senior',
                'rating' => 4.9,
                'stock_quantity' => 35,

            ],
            [
                'title' => 'Rabbit Pellets - Timothy Hay',
                'brand' => 'Oxbow',
                'description' => 'High-fiber pellets made from timothy hay, perfect for adult rabbit nutrition.',
                'price' => 680.00,
                'old_price' => null,
                'pet_type' => 'rabbit',
                'age_group' => 'adult',
                'food_type' => 'dry',
                'weight' => '1kg',
                'image' => 'https://images-cdn.ubuy.co.id/65b4a8dfd4f9a162d5662ca8-menu-premium-rabbit-food-timothy-hay.jpg',
                'badge' => 'Natural',
                'rating' => 4.4,
                'stock_quantity' => 45,

            ],
            [
                'title' => 'Dentastix - Dental Treats',
                'brand' => 'Pedigree',
                'description' => 'Daily dental care treats that help reduce tartar buildup and freshen breath.',
                'price' => 380.00,
                'old_price' => 420.00,
                'pet_type' => 'dog',
                'age_group' => 'adult',
                'food_type' => 'treats',
                'weight' => '28 Sticks',
                'image' => 'https://images.albertsons-media.com/is/image/ABS/960225872?$ng-ecom-pdp-desktop$&defaultImage=Not_Available',
                'badge' => 'Bestseller',
                'rating' => 4.6,
                'stock_quantity' => 80,

            ],
            [
                'title' => 'Tropical Fish Flakes',
                'brand' => 'Tetra',
                'description' => 'Complete nutrition for tropical fish with enhanced colors and vitality.',
                'price' => 280.00,
                'old_price' => null,
                'pet_type' => 'fish',
                'age_group' => 'adult',
                'food_type' => 'dry',
                'weight' => '200g',
                'image' => 'https://static-01.daraz.com.bd/p/692b29da77a63c12c2d2a1b6d403bb48.jpg',
                'badge' => 'Aquatic',
                'rating' => 4.3,
                'stock_quantity' => 70,

            ]
        ];

        foreach ($products as $product) {
            FoodProduct::create($product);
        }
    }
}
