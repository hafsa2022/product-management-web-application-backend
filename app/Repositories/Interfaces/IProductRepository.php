<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Product;

interface IProductRepository
{
    public function addProduct(Product $product);

    public function getProduct($id);

    public function getAllProducts();

    public function updateProduct(Request $request);

    public function deleteProduct($id);

}
