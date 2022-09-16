<?php

namespace App\Interfaces;


interface ProductInterface{
    public function addProduct(array $data);
    public function getAllProduct();
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
    public function getProductId();
    public function showProduct($slug);
}

?>
