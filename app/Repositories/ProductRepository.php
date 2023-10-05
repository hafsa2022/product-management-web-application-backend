<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductRepository implements IProductRepository
{
    protected $model;

    public function _construct(Product $product)
    {
        $this->model = $product;
    }

    public function addProduct(Product $product)
    {
        $product->save();
        return $product;
    }

    public function getProduct($id)
    {
        $productSearched = DB::table('products')
        ->where('products.id', $id)
        ->get();
        return $productSearched;

    }

    public function getAllProducts()
    {
        $products = DB::table('products')
                    ->get();
         return $products;
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);

        if(!empty($request->file('image'))){
            $path = 'storage/images/products';
            if(file_exists(public_path($path .'/'. $request->image))){
                $file_name = $product->image;
            }else
            {
                $file_extension = $request->file('image')->getClientOriginalExtension();
                $file_name = time().'.'.$file_extension;
                $request->image->move($path,$file_name);
            }
            $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price'=>$request->input('price'),
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'image' => $file_name,
            'productImage' => $request->input('image'),
            'stock_quantity' => $request->input('stockQuantity'),
             ]);
        }else {
            $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price'=>$request->input('price'),
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'stock_quantity' => $request->input('stockQuantity'),
            ]);
        }
        return $product;
    }

    public function deleteProduct($id){
        $productToDelete = DB::table('products')
        ->where('products.id', $id)
        ->delete();

        return DB::table('products')
        ->orderBy('id','desc')
        ->get();
    }
}
?>
