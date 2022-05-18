<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductDetailsResource;
use App\Http\Resources\ProductResource;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function CreateProduct(ProductRequest $request){
        $data=$request->all();
        $file_extention=$data['images']->getClientOriginalExtension();
        $file_name = time().rand(99,999).'images.'.$file_extention;
        $file_path = $data['images']->move(public_path().'/products/image',$file_name);

        product::create([
            "p_name"=>$data['name'],
            "p_description"=>$data['description'],
            "images"=>$file_path,
            'user_id' => $request->user()->id,
        ]);
        return response()->json('added',200);
    }



   public function allProducts(){
       $products=product::all();
       return ProductResource::collection($products);
   }



   public function deleteProduct($productId)
   {
       product::where('id', $productId)->forceDelete();
       return response()->json('done',200);
   }


   public function update(ProductRequest $request, $productId ){
      $data=$request->all();

      product::where('id',$productId)->update([
        'p_name'=>$data['name'],
        'p_description'=>$data['description'],
        'images'=>$data['images'],
        'user_id' => $request->user()->id,
    ]);

   }

   public function productsDetails(){
    $products=product::all();
    return ProductDetailsResource::collection($products);
   }
}
