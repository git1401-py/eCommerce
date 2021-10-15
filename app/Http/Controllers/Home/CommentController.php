<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5|max:7000',
            'rate' => 'required|digits_between:0,5'
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#comments')->withErrors($validator);
        }

        if (auth()->check()) {
            try {
                DB::beginTransaction();

                $comment = new Comment();
                $comment->user_id = auth()->id();
                $comment->product_id = $product->id;
                $comment->text = $request->text;

                $comment->save();

                if($product->rates()->where( 'user_id' , auth()->id() )->exists()){
                    $productRate = $product->rates()->where( 'user_id' , auth()->id() )->first();
                    // dd($productRate , $request->rate);
                    $productRate->update([
                        'rate' => $request->rate
                    ]);
                }else{
                    $rate = new ProductRate();
                    $rate->user_id = auth()->id();
                    $rate->product_id = $product->id;
                    $rate->rate = $request->rate;

                    $rate->save();
                }
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();

                alert()->error('مشکل در ایجاد محصول', $ex->getMessage())->persistent('حله');
                return redirect()->back();
            }
            alert()->success('نظر ارزشمند شما با موفقیت برای این محصول ثبت شد', 'با تشکر');
            return redirect()->back();
        } else {
            alert()->warning('دقت کنید', 'برای ثبت نظر نیاز هست در ابتدا وارد سایت شوید')->persistent('حله');
            return redirect()->back();
        }
    }

    public function usersProfileIndex()
    {
        $comments = Comment::where('user_id' , auth()->id())->where('approved' , 1)->get();
        return view('home.users_profile.comments' , compact('comments'));
    }
}
