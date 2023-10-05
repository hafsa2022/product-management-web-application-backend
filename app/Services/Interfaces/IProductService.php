<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IProductService
{
    public function addProduct(Request $request);

    public function getProduct($id);

    public function getAllProducts();

    public function updateProduct(Request $request);

    public function deleteProduct($id);

}
