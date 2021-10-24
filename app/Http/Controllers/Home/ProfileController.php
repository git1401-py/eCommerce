<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // $attributes = Attribute::latest()->paginate(20);
        // return view('admin.attributes.index' , compact('attributes'));
        return view('home.users_profile.index');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'cellphone' => 'required|iran_mobile',
            'avatar' => 'nullable|mimes:jpg,jpeg,png,svg'
        ]);
        $fileNameImage ="";
        if($request->has('avatar')){
            // dd("fff");
            $fileNameImage = generateFileName($request->avatar->getClientOriginalName());
            $request->avatar->move(public_path(env('User_IMAGES_UPLOAD_PATH')), $fileNameImage);
        }
        auth()->user()->update([
            'name' => $request->has('name') ? $request->name : "کاربر گرامی",
            'cellphone' => $request->cellphone,
            'email' => $request->email,
            'avatar' => $request->has('avatar') ? $fileNameImage : auth()->user()->avatar
        ]);

        alert()->success('پروفایل ویرایش شد', 'با تشکر');

        return redirect()->route('home.users_profile.index');
    }
}
