<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
        public function create()
        {

            return view('categories.create');
        }

        public function index()
        {
        $this->authorize('viewAny', Category::class);
            $Categories = Category::paginate(3); // Lấy 3 người dùng trên mỗi trang

            return view('categories.index', compact('Categories'));
        }

        public function store(Request $request)
        {
            $data = $request->validate(
                ['name' => 'required|unique:categories|max:255',],
                ['name.unique' => 'Tên đã tồn tại, Vui lòng nhập tên khác',
                'name.required' =>'Hãy nhập tên vào',
                ]
            );
            try {
                DB::beginTransaction();
                $Categories = new Category();
                $Categories->name = $data['name'];
                $Categories->save();
                DB::commit();
                return redirect()->route('category.index')->with('success', 'Thêm mới thành công!');;
            } catch (\Exception $ex) {
                DB::rollback();
                // Xử lý ngoại lệ (exception) ở đây nếu cần thiết
            }
        }

        public function edit($id)
        {
            $Categories = Category::find($id);
            return view('categories.edit', compact('Categories'));
        }

        public function update(CategoryRequest $request, $id)
        {
            $Categories = Category::find($id);
            $Categories->name = $request->name;
            $Categories->save();
            return redirect()->route('category.index')->with('success', 'Thao tác thành công!');;
        }

        public function destroy($id)
        {
            $Categories = Category::find($id);
            $Categories->delete();
            return redirect()->route('category.index')->with('success', 'Xoá thành công!');;
        }

        public function search(Request $request)
        {
            $keyword = $request->input('keyword');
            $Categories = Category::where('name', 'like', "%$keyword")
                ->paginate(3);
            return view('categories.index', compact('Categories'));
        }
    }
