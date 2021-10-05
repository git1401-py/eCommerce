<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store($attributes , $product){
        foreach($attributes as  $key => $value){
            $product_attribute = new ProductAttribute();
                $product_attribute->product_id = $product->id;
                $product_attribute->attribute_id = $key;
                $product_attribute->value = $value;

                $product_attribute->save();
        }
    }
    public function update($attributesIds){
        foreach($attributesIds as  $key => $value){
            $productAttribute = ProductAttribute::findOrFail($key);
            $productAttribute->update([
                'value' => $value,
            ]);
        }
    }
}
