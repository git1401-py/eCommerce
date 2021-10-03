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
}
