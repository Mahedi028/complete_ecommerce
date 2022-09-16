<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepositories implements ProductInterface{

    public function addProduct(array $data)
    {
        return Product::create($data);
    }
    public function getAllProduct()
    {
        return Product::select(['id','title', 'slug', 'selling_price', 'original_price'])->where('active', 1)->paginate(9);
    }
    public function updateProduct($id, array $data)
    {

    }
    public function deleteProduct($id)
    {

    }
    public function getProductId()
    {

    }
    public function showProduct($slug)
    {
        return Product::where('slug', $slug)->where('active', 1)->first();
    }



}




?>
