<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        Product::factory()->count(10)->create();

        // $imageUrl=fake()->imageUrl();
        $url = 'https://media.istockphoto.com/photos/businessman-using-a-computer-for-property-sales-listings-real-estate-picture-id1335050734?s=612x612';

        $products=Product::select('id')->get();

        foreach($products as $product)
        {
            // $product->addMediaFromUrl('https://lorempixel.com/640/480/?75974')->toMediaCollection('products');
            $product->addMediaFromUrl($url)->toMediaCollection('products');
        }
    }
}
