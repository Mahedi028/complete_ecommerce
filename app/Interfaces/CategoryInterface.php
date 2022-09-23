<?php

namespace App\Interfaces;


interface CategoryInterface{
    public function addCategory(array $data);
    public function getAllCategory();
    public function updateCategory($id, array $data);
    public function deleteCategory($id);
    public function getCategoryId($id);
    public function showCategory($slug);
}

?>
