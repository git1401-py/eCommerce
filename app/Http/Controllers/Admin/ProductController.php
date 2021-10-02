<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductImageController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $tags = Tag::all();
        $categories = Category::where('parent_id' , '!=' , 0)->get();

        return view('admin.products.create' , compact('brands' , 'tags' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'brand_id' => 'required',
        //     'is_active' => 'required',
        //     'tag_ids' => 'required',
        //     'description' => 'required',
        //     'primary_image' => 'required|mimes:jpg,jpeg,png,svg',
        //     'images' => 'required',
        //     'images.*' => 'mimes:jpg,jpeg,png,svg',
        //     'category_id' => 'required',
        //     'attribute_ids' => 'required',
        //     'attribute_ids.*' => 'required',
        //     'variation_values' => 'required',
        //     'variation_values.*.*' => 'required',
        //     'variation_values.price.*' => 'integer',
        //     'variation_values.quantity.*' => 'integer',
        //     'delivery_amount' => 'required|integer',
        //     'delivery_amount_per_product' => 'nullable|integer',
        // ]);

        // try{
        //     DB::beginTransaction();
            $product = new Product();

            $ProductImageController = new ProductImageController;
            $fileNamePrimaryImage = $ProductImageController->upload($request->primary_image , $request->images);

            dd($fileNamePrimaryImage);
            // $product->name = $request->name;

            // $product->save();


        //     foreach($request->attribute_ids as $attributeId){
        //         $attribute = Attribute::findOrFail($attributeId);
        //         $attribute->categories()->attach($category->id , [
        //         'is_filter' => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0 ,
        //         'is_variation' => $request->variation_id == $attributeId ? 1 : 0
        //         ]);
        // }
        // DB::commit();
        // } catch (\Exception $ex) {
        //     DB::rollBack();
        //     alert()->error('مشکل در ایجاد محصول', $ex->getMessage())->persistent('حله');
        //     return redirect()->back();
        // }

        // alert()->success('محصول مورد نظر ایجاد شد', 'با تشکر');
        // return redirect()->route('admin.products.index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
