<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = UserAddress::where('user_id' , auth()->id())->get();
        $provinces = Province::all();
        return view('home.users_profile.addresses' , compact('provinces' , 'addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validateWithBag('addressStore' , [
            'title' => 'required',
            'cellphone' => 'required|iran_mobile',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required|iran_postal_code',
        ]);

        $user_address = new UserAddress();
        $user_address->user_id = auth()->id();
        $user_address->title = $request->title;
        $user_address->cellphone = $request->cellphone;
        $user_address->province_id = $request->province_id;
        $user_address->city_id = $request->city_id;
        $user_address->address = $request->address;
        $user_address->postal_code = $request->postal_code;
        $user_address->save();

        alert()->success('آدرس مورد نظر ایجاد شد', 'با تشکر');
        return redirect()->back();
        // return redirect()->route('home.addresses.index');
    }

    public function update(Request $request, UserAddress $address)
    {
        $validator = Validator::make($request->all() , [
            'title' => 'required',
            'cellphone' => 'required|iran_mobile',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required|iran_postal_code',
        ]);
        if($validator->fails()){
            $validator->errors()->add('address_id' , $address->id);
            return redirect()->back()->withErrors($validator , 'addressUpdate')->withInput();
        }

        $address->update([
            'title' => $request->title,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);
        alert()->success('آدرس مورد نظر ویرایش شد', 'با تشکر');

        return redirect()->route('home.addresses.index');
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
    public function getProvinceCitiesLis(Request $request)
    {
        $cities = City::where('province_id' , $request->province_id)->get();

        return $cities;
    }
}
