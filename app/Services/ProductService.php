<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IProductService;
use App\Repositories\Interfaces\IProductRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Product;



class ProductService implements IProductService
{
    protected $repository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }
    public function addProduct(Request $request)
    {
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'storage/images/products';
        $request->image->move($path,$file_name);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->type = $request->type;
        $product->image = $file_name;
        $product->productImage=$request->image;
        $product->stock_quantity = $request->stockQuantity;
        $product->user_id = $request->userId;

        $product = $this->repository->addProduct($product);

        return $product;
    }

    public function getProduct($id){


        $product = $this->repository->getProduct($id);

        return $product;
    }

    public function getAllProducts(){


        $products = $this->repository->getAllProducts();

        return $products;
    }

    public function updateProduct(Request $request){


        $product = $this->repository->updateProduct($request);

        return $product;
    }


    public function deleteProduct($id){


        $product = $this->repository->deleteProduct($id);

        return $product;
    }
}
