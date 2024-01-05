<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::with('category')->latest('created_at')->paginate(6);
        return view('products.index', compact('product'));
    }
    public function create()
    {

        $categories = Category::all(); // Lấy danh sách các categories từ cơ sở dữ liệu
        return view('products.create', compact('categories'));
    }
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        // Lấy categories_id từ liên kết id khoá chính của bảng categories
        $categories = Category::find($request->category_id);
        $product->category_id = $categories->id;

        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\product';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();

        $product = Product::orderBy('created_at', 'desc')->paginate(6);
        // return redirect()->route('product.index', compact('product'));
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all(); // Lấy danh sách các categories từ cơ sở dữ liệu

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $categories = Category::find($request->category_id);
        $product->category_id = $categories->id;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public\uploads\product' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public\uploads\product';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Sửa thành công!');
    }
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('product.index')->with('success', 'Xoá thành công!');
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $product = Product::where('name', 'like', "%$keyword%")
            ->paginate(3);

        return view('products.index', compact('product'));
    }



    public function show($id){
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }


    public  function softdeletes($id)
    {
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $product->save();
        return redirect()->route('product.index')->with('success', 'Thao tác thành công!');;
    }
    public function restoredelete($id)
    {
        // $this->authorize('restore', Category::class);
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('product.index')->with('success', 'Khôi phục thành công!');;
    }

    public  function trash()
    {
        $products = Product::onlyTrashed()->paginate(3);
        $param = ['products' => $products];
        return view('products.trash', $param);
        dd(223);
    }
}
