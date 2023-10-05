<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Services\Interfaces\IProductService;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductService $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProduct($productId)
    {
       return response()->json($this->productService->getProduct($productId));
    }

    public function getAllProducts()
    {
        return response()->json($this->productService->getAllProducts());


    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:products,name',
        ]);
        return response()->json($this->productService->addProduct($request));
    }

    public function updateProduct(Request $request)
    {
        return response()->json($this->productService->updateProduct($request));
    }

    public function deleteProduct($id)
    {
        return response()->json($this->productService->deleteProduct($id));
    }
}

