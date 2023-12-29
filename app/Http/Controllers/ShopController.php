<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ShopController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::all();
        return view('shop', compact('products'));
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
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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
}
