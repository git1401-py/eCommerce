<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // $attributes = Attribute::latest()->paginate(20);
        // return view('admin.attributes.index' , compact('attributes'));
        return view('home.users_profile.index');
    }
}
