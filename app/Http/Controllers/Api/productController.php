<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function CreateProduct(ProductRequest $request){
        $data=$request->all();
        product::create($data);
        return "added successfull";
    }

   public function allProducts(){
       $products=product::all();
       return ProductResource::collection($products);
   }

   public function deleteProduct($productId)
   {
       product::where('id', $productId)->delete();
       return response()->json('done',200);
   }
}
