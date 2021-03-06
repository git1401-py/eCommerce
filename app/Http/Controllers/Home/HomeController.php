<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index(){

        SEOTools::setTitle('Home');
        SEOTools::setDescription('This is my page description');
        SEOTools::opengraph()->setUrl(route('home.index'));
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');



        $sliders = Banner::where('type' , 'slider')->where('is_active' , 1)->orderBy('priority')->get();
        $indexTopBanners = Banner::where('type' , 'index-top')->where('is_active' , 1)->orderBy('priority')->get();
        $indexBottomBanners = Banner::where('type' , 'index-bottom')->where('is_active' , 1)->orderBy('priority')->get();

        // $products = Product::where('is_active' , 1)->get()->take(5);

        $menProducts = subProducts('مردانه');
        $womenProducts = subProducts('زنانه');
        $childrenProducts = subProducts('بچه گانه');

        /*$product = Product::find(2);
        dd($product->quantity_check);*/
        /*$product = Product::find(1);
        dd($product->sale_check);*/

        return view('home.index' , compact('sliders' , 'indexTopBanners' , 'indexBottomBanners' , 'menProducts' , 'womenProducts' , 'childrenProducts'));
    }
    public function aboutUs()
    {
        $indexBottomBanners = Banner::where('type' , 'index-bottom')->where('is_active' , 1)->orderBy('priority')->get();

        return view('home.about-us'  , compact('indexBottomBanners'));
    }
    public function contactUs()
    {
        $setting = Setting::findOrFail(1);
        return view('home.contact-us'  , compact('setting') );
    }
    public function contactUsForm(Request $request)
    {
        //  dd( $request->all());
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|min:4|max:100',
            'message' => 'required|string|min:4|max:3000',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]
        ]);

        $contact_us = new ContactUs();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->subject = $request->subject;
        $contact_us->text = $request->message;
        $contact_us->save();

        alert()->success('پیام شما ارسال شد', 'با تشکر');
        return redirect()->back();
    }
}
