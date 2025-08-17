<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ToyProduct;

class ToyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $products = [
            [
                'title' => 'Interactive Dog Puzzle Toy',
                'brand' => 'KONG',
                'description' => 'Mental stimulation toy that keeps dogs engaged and entertained for hours.',
                'price' => 450.00,
                'old_price' => 550.00,
                'pet_type' => 'dog',
                'age_group' => 'adult',
                'toy_type' => 'puzzle',
                'size' => 'medium',
                'image' => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Popular',
                'rating' => 4.8,
                'stock_quantity' => 75,
                'features' => ['Durable', 'Interactive', 'Mental Stimulation'],
                'is_active' => true
            ],
            [
                'title' => 'Cat Feather Teaser Wand',
                'brand' => 'PetSafe',
                'description' => 'Interactive wand toy with colorful feathers to stimulate your cat\'s hunting instincts.',
                'price' => 280.00,
                'old_price' => 350.00,
                'pet_type' => 'cat',
                'age_group' => 'adult',
                'toy_type' => 'interactive',
                'size' => 'small',
                'image' => 'https://images.unsplash.com/photo-1514888286974-6c03e5a93d3f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'New',
                'rating' => 4.6,
                'stock_quantity' => 120,
                'features' => ['Interactive', 'Safe', 'Exercise'],
                'is_active' => true
            ],
            [
                'title' => 'Chew-Resistant Rope Toy',
                'brand' => 'Nylabone',
                'description' => 'Durable rope toy perfect for aggressive chewers and teething puppies.',
                'price' => 320.00,
                'old_price' => 400.00,
                'pet_type' => 'dog',
                'age_group' => 'puppy',
                'toy_type' => 'chew',
                'size' => 'large',
                'image' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Durable',
                'rating' => 4.7,
                'stock_quantity' => 90,
                'features' => ['Durable', 'Teething', 'Exercise'],
                'is_active' => true
            ],
            [
                'title' => 'Bird Mirror & Bell Toy',
                'brand' => 'Kaytee',
                'description' => 'Colorful mirror and bell combination toy for birds to play and interact with.',
                'price' => 180.00,
                'old_price' => 220.00,
                'pet_type' => 'bird',
                'age_group' => 'adult',
                'toy_type' => 'interactive',
                'size' => 'small',
                'image' => 'https://images.unsplash.com/photo-1444464666168-49d633b86797?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Interactive',
                'rating' => 4.5,
                'stock_quantity' => 150,
                'features' => ['Interactive', 'Colorful', 'Stimulation'],
                'is_active' => true
            ],
            [
                'title' => 'Rabbit Chew Sticks',
                'brand' => 'Oxbow',
                'description' => 'Natural willow and apple wood chew sticks for rabbits to maintain dental health.',
                'price' => 150.00,
                'old_price' => 180.00,
                'pet_type' => 'rabbit',
                'age_group' => 'adult',
                'toy_type' => 'chew',
                'size' => 'medium',
                'image' => 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Natural',
                'rating' => 4.4,
                'stock_quantity' => 200,
                'features' => ['Natural', 'Dental Health', 'Safe'],
                'is_active' => true
            ],
            [
                'title' => 'Fish Tank Decorations',
                'brand' => 'Marineland',
                'description' => 'Colorful and safe decorations for fish tanks to create an engaging environment.',
                'price' => 250.00,
                'old_price' => 300.00,
                'pet_type' => 'fish',
                'age_group' => 'adult',
                'toy_type' => 'decorative',
                'size' => 'medium',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Colorful',
                'rating' => 4.3,
                'stock_quantity' => 80,
                'features' => ['Safe', 'Colorful', 'Environment'],
                'is_active' => true
            ],
            [
                'title' => 'Plush Cat Bed Toy',
                'brand' => 'Frisco',
                'description' => 'Soft and cozy plush toy that doubles as a comfortable bed for cats.',
                'price' => 380.00,
                'old_price' => 450.00,
                'pet_type' => 'cat',
                'age_group' => 'senior',
                'toy_type' => 'plush',
                'size' => 'medium',
                'image' => 'https://images.unsplash.com/photo-1513360371669-4adf3dd7dff8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Comfortable',
                'rating' => 4.6,
                'stock_quantity' => 60,
                'features' => ['Soft', 'Comfortable', 'Multi-purpose'],
                'is_active' => true
            ],
            [
                'title' => 'Dog Training Clicker',
                'brand' => 'PetSafe',
                'description' => 'Professional training clicker for positive reinforcement dog training.',
                'price' => 120.00,
                'old_price' => 150.00,
                'pet_type' => 'dog',
                'age_group' => 'puppy',
                'toy_type' => 'training',
                'size' => 'small',
                'image' => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Training',
                'rating' => 4.9,
                'stock_quantity' => 300,
                'features' => ['Training', 'Professional', 'Effective'],
                'is_active' => true
            ]
        ];

        foreach ($products as $product) {
            ToyProduct::create($product);
        }
    }
}
