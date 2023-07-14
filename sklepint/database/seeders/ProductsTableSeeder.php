<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Banany',
                'price' => 2.50,
            ],
            [
                'name' => 'Jabłka',
                'price' => 1.80,
            ],
            [
                'name' => 'Jajka',
                'price' => 1.80,
            ],
            [
                'name' => 'Woda',
                'price' => 1.80,
            ],
            [
                'name' => 'Sok pomarańczowy',
                'price' => 1.80,
            ],
          
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
