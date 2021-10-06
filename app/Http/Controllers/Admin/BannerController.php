<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(20);
        return view('admin.banners.index' , compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required|integer',
            'type' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',

        ]);
        $BannerImageController = new BannerImageController;
        $fileNameImage = $BannerImageController->upload($request->image);

        $banner = new Banner();
        $banner->image = $fileNameImage;

        $banner->title = $request->title;
        $banner->text = $request->text;
        $banner->priority = $request->priority;
        $banner->type = $request->type;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->button_icon = $request->button_icon;
        $banner->is_active = $request->is_active;
        $banner->save();

        alert()->success('بنر مورد نظر ایجاد شد', 'با تشکر');

        return redirect()->route('admin.banners.index');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show' , compact('banner'));
    }
    public function showImage(Banner $banner)
    {
        return view('admin.banners.showImage' , compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit' , compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'priority' => 'required|integer',
            'type' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg',

        ]);
        $fileNameImage ="";
        if($request->has('image')){
            // dd("fff");
            $fileNameImage = generateFileName($request->image->getClientOriginalName());
            $request->image->move(public_path(env('BANNER_IMAGES_UPLOAD_PATH')), $fileNameImage);
        }

        $banner->update([
            'image' => $request->has('image') ? $fileNameImage : $banner->image,
            'title' => $request->title,
            'text' => $request->text,
            'priority' => $request->priority,
            'type' => $request->type,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'button_icon' => $request->button_icon,
            'is_active' => $request->is_active
        ]);
        alert()->success('بنر مورد نظر ویرایش شد', 'با تشکر');

        return redirect()->route('admin.banners.index');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        alert()->success('بنر مورد نظر حذف شد', 'با تشکر');

        return redirect()->route('admin.banners.index');
    }
}
