<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run()
    {
        MenuItem::insert([
            [
                'name' => 'Pizza',
                'description' => 'Delicious cheese pizza with fresh ingredients.',
                'price' => 9.99,
                'category' => 'Main Course',
                'image_url' => 'url_to_pizza_image',
            ],
            [
                'name' => 'Burger',
                'description' => 'Juicy beef burger served with fries.',
                'price' => 5.99,
                'category' => 'Main Course',
                'image_url' => 'url_to_burger_image',
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Fresh romaine lettuce with Caesar dressing and croutons.',
                'price' => 7.49,
                'category' => 'Salads',
                'image_url' => 'url_to_caesar_salad_image',
            ],
            [
                'name' => 'Pasta Carbonara',
                'description' => 'Pasta with creamy sauce, bacon, and parmesan cheese.',
                'price' => 11.99,
                'category' => 'Main Course',
                'image_url' => 'url_to_pasta_image',
            ],
            [
                'name' => 'Cheesecake',
                'description' => 'Rich and creamy cheesecake with a graham cracker crust.',
                'price' => 4.99,
                'category' => 'Desserts',
                'image_url' => 'url_to_cheesecake_image',
            ],
        ]);
    }
}
