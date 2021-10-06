<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductImageController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $categories = Category::where('parent_id', '!=', 0)->get();

        return view('admin.products.create', compact('brands', 'tags', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'is_active' => 'required',
            'tag_ids' => 'required',
            'description' => 'required',
            'primary_image' => 'required|mimes:jpg,jpeg,png,svg',
            'images' => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,svg',
            'category_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.*' => 'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ]);

        try {
            DB::beginTransaction();

            $ProductImageController = new ProductImageController;
            $fileNameImages = $ProductImageController->upload($request->primary_image, $request->images);

            $product = new Product();
            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->is_active = $request->is_active;
            $product->description = $request->description;
            $product->primary_image = $fileNameImages['fileNamePrimaryImage'];
            $product->category_id = $request->category_id;
            $product->delivery_amount = $request->delivery_amount;
            $product->delivery_amount_per_product = $request->delivery_amount_per_product;

            $product->save();

            foreach ($fileNameImages['fileNameImages'] as $fileNameImage) {
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image = $fileNameImage;

                $product_image->save();
            }

            $ProductAttributeController = new ProductAttributeController();
            $ProductAttributeController->store($request->attribute_ids, $product);

            $attributeId = (Category::find($request->category_id))->attributes()->wherePivot('is_variation', 1)->first()->id;
            $ProductVariationController = new ProductVariationController();
            $ProductVariationController->store($request->variation_values, $attributeId, $product);

            $product->tags()->attach($request->tag_ids);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ایجاد محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('محصول مورد نظر ایجاد شد', 'با تشکر');
        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        $productAttributes = $product->attributes()->with('attribute')->get();
        $productVariations = $product->variations;
        $images = $product->images;
        return view('admin.products.show', compact('product', 'productAttributes', 'productVariations', 'images'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $productAttributes = $product->attributes()->with('attribute')->get();
        $productVariations = $product->variations;
        return view('admin.products.edit', compact('product', 'brands', 'tags', 'productAttributes', 'productVariations'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'is_active' => 'required',
            'tag_ids' => 'required',
            'tag_ids.*' => 'exists:tags,id',
            'description' => 'required',
            'attribute_values' => 'required',
            'variation_values' => 'required',
            'variation_values.*.price' => 'required|integer',
            'variation_values.*.quantity' => 'required|integer',
            'variation_values.*.salePrice' => 'nullable|integer',
            'variation_values.*.date_on_sale_from' => 'nullable',
            // 'variation_values.*.date_on_sale_from' => 'nullable|date',
            'variation_values.*.date_on_sale_to' => 'nullable',
            // 'variation_values.*.date_on_sale_to' => 'nullable|date',
            'delivery_amount' => 'required|integer',
            'delivery_amount_per_product' => 'nullable|integer',
        ]);
        try {
            DB::beginTransaction();
            $product->update([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'is_active' => $request->is_active,
                'description' => $request->description,
                'delivery_amount' => $request->delivery_amount,
                'delivery_amount_per_product' => $request->delivery_amount_per_product,
            ]);

            $product->tags()->sync($request->tag_ids);

            $ProductAttributeController = new ProductAttributeController();
            $ProductAttributeController->update($request->attribute_values);

            $ProductVariationController = new ProductVariationController();
            $ProductVariationController->update($request->variation_values);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('محصول مورد نظر ویرایش شد', 'با تشکر');
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        //
    }
    public function editCategory(Request $request, Product $product)
    {
        $categories = Category::where('parent_id', '!=', 0)->get();

        return view('admin.products.edit_category', compact('product', 'categories'));
    }
    public function updateCategory(Request $request, Product $product)
    {
        $request->validate([

            'category_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'required',
            'variation_values' => 'required',
            'variation_values.*.*' => 'required',
            'variation_values.price.*' => 'integer',
            'variation_values.quantity.*' => 'integer',

        ]);
        try {
            DB::beginTransaction();
            $product->update([
                'category_id' => $request->category_id,
            ]);

            $ProductAttributeController = new ProductAttributeController();
            $ProductAttributeController->change($request->attribute_ids, $product);

            $attributeId = (Category::find($request->category_id))->attributes()->wherePivot('is_variation', 1)->first()->id;
            $ProductVariationController = new ProductVariationController();
            $ProductVariationController->change($request->variation_values, $attributeId, $product);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش محصول', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('محصول مورد نظر ویرایش شد', 'با تشکر');
        return redirect()->route('admin.products.index');
    }
}
