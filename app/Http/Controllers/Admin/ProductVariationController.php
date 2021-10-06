<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store($variations , $attributeId , $product)
    {
        $counter = count($variations['value']);
        for ($i = 0; $i < $counter; $i++) {
            $product_variation = new ProductVariation();
            $product_variation->attribute_id = $attributeId;
            $product_variation->product_id = $product->id;
            $product_variation->value = $variations['value'][$i];
            $product_variation->price = $variations['price'][$i];
            $product_variation->quantity = $variations['quantity'][$i];
            $product_variation->sku = $variations['sku'][$i];

            $product_variation->save();
        }
    }
    public function update($variationIds){
        foreach($variationIds as  $key => $value){
            $productVariation = ProductVariation::findOrFail($key);

            $productVariation->update([
                'price' => $value['price'],
                'quantity' => $value['quantity'],
                'sku' => $value['sku'],
                'sale_price' => $value['sale_price'],
                'date_on_sale_from' => convertShamsiToGregoriantDate($value['date_on_sale_from']),
                'date_on_sale_to' => convertShamsiToGregoriantDate($value['date_on_sale_to']),
            ]);
        }
    }
    public function change($variations , $attributeId , $product)
    {
        ProductVariation::where('product_id' , $product->id)->delete();

        $counter = count($variations['value']);
        for ($i = 0; $i < $counter; $i++) {
            $product_variation = new ProductVariation();
            $product_variation->attribute_id = $attributeId;
            $product_variation->product_id = $product->id;
            $product_variation->value = $variations['value'][$i];
            $product_variation->price = $variations['price'][$i];
            $product_variation->quantity = $variations['quantity'][$i];
            $product_variation->sku = $variations['sku'][$i];

            $product_variation->save();
        }
    }
}
