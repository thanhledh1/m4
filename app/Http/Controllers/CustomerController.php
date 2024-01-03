<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Http\Requests\RegisterRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{


    public function index()
    {
    $this->authorize('viewAny', Customer::class);

        $customer = Customer::paginate(7); // Lấy 3 người dùng trên mỗi trang

        return view('customers.index', compact('customer'));
    }
    //
    public function register()
    {
        return view('customers.register');
    }

    public function checkRegister(RegisterRequest $request)
    {



        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);

        if ($request->psw == $request->psw_repeat) {
            $customer->save();

            return redirect()->route('shop.index');
        } else {


            return redirect()->route('shop.register');
        }
    }

    public function indexlogin()
    {
        return view('customers.login');
    }
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('cart');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function checkOut()
    {
        return view('checkout');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('shop.index');
    }
}
