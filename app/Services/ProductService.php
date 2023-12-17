<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::whereNull('deleted_at')->get();
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function updateProduct($data, $id)
    {
        $product = $this->getProductById($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->getProductById($id);
        $product->delete();
        return $product;
    }
}
