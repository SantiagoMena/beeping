<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()
            ->count(10)
            ->create();

        Order::factory()
            ->count(20)
            ->create()
            ->each(function ($order) use ($products){
                $totalProducts = count($products);
                $randomProducts = rand(1, $totalProducts-1);
                $createProducts = $products->random($randomProducts);
                $createProducts->each(function ($product) use ($order){
                   OrderLine::factory()
                       ->create([
                           'product_id' => $product->id,
                           'order_id' => $order->id,
                       ]);
                });
            });

    }
}
