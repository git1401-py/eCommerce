<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OTPSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if ($request->method() == 'GET') {
            return view('auth.login');
        }

        $request->validate([
            'cellphone' => 'required|iran_mobile'
        ]);

        $user = User::where('cellphone', $request->cellphone)->first();

        try {
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DCDCojhgvgv@gfh%xbd!!gdxgf&&cgh');
            if ($user) {
                $user->update([
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);
            } else {
                $user = new User();
                $user->otp = $OTPCode;
                $user->login_token = $loginToken;
                $user->cellphone = $request->cellphone;

                $user->save();

            }
            $user->notify(new OTPSms($OTPCode));

            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['eroors' => $ex->getMessage()], 422);
        }
    }


    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp'           => 'required|digits:6',
            'login_token'   => 'required'
        ]);

        $user = User::where('login_token', $request->login_token)->firstOrFail();
        try {
            if ($user->otp == $request->otp) {
                auth()->login($user, $remember = true);
                return response(['ورود با موفقیت انجام شد'], 200);
            } else {
                return response(['errors' => ['otp' => 'کد تاییدیه نادرست است']], 422);
            }
        } catch (\Exception $ex) {
            return response(['eroors' => $ex->getMessage()], 422);
        }
    }
    public function resendOtp(Request $request)
    {


        $request->validate([
            'login_token' => 'required'
        ]);


        try {
            $user = User::where('login_token', $request->login_token)->first();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DCDCojhgvgv@gfh%xbd!!gdxgf&&cgh');

            $user->update([
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);

            $user->notify(new OTPSms($OTPCode));

            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['eroors' => $ex->getMessage()], 422);
        }
    }
}
