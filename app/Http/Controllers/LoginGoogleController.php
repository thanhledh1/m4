<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $customer = Socialite::driver('google')->user();

            $findCustomer = Customer::where('google_id', $customer->id)->first();

            if ($findCustomer) {
                Auth::guard('customers')->login($findCustomer);
                return redirect()->route('shop.index');
            } else {
                $newCustomer = Customer::create([
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'google_id' => $customer->id,
                    'password' => bcrypt('123')
                ]);

                Auth::guard('customers')->login($newCustomer);
                return redirect()->route('shop.index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
