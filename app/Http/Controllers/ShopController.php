<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::paginate(4);
        return view('shop', compact('products'));
    }

    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');

        $data = Product::orderBy('id', 'ASC')
            ->offset($start)
            ->limit(4)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 4
        ]);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '<>', $product->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->get();
        return view('detail', compact('product', 'relatedProducts'));
    }


    public function show($id){
        $product = Product::find($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '<>', $product->id) // Loại bỏ sản phẩm hiện tại
        ->inRandomOrder() // Sắp xếp ngẫu nhiên
        ->get();

        return view('detail', compact('product','relatedProducts'));
    }

    public function apple()
    {
        $products = Product::where('category_id', '3')->get();
        return view('test.apple', compact('products'));
    }
    public function samsung()
    {
        $products = Product::where('category_id', '1')->get();
        return view('test.samsung', compact('products'));
    } public function vivo()
    {
        $products = Product::where('category_id', '5')->get();
        return view('test.vivo', compact('products'));
    } public function xiaomi()
    {
        $products = Product::where('category_id', '6')->get();
        return view('test.xiaomi', compact('products'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
        public function cart()
        {
            return view('cart');
        }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm giỏ hàng thành công!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', "%$keyword%")
            ->paginate(3);

        return view('shop', compact('products'));
    }

    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = 1;

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        return redirect()->route('shop.index')->with('success', 'Đặt Hàng thành công!');

    }
}
