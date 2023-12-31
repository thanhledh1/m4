<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Models\Group;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('user.index', $param);
    }

    public function showAdmin()
    {
        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('user.admin', $param);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('user.add', $param);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public\uploads\users';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $user->save();
        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        return redirect()->route('user.index')->with('success', 'Thao tác thành công!');
    }

    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param = [
            'user' => $user,
        ];
        return view('user.profile', $param);
    }

    public function edit($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param = [
            'user' => $user,
            'groups' => $groups
        ];
        return view('user.edit', $param);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public\uploads\users' . $user->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public\uploads\users';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'Thao tác thành công!');
    }

    // hiển thị form đổi mật khẩu
    public function editpass($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $param = [
            'user' => $user,
        ];
        return view('user.editpass', $param);
    }
    
    // chỉ có superAdmin mới có quyền đổi mật khẩu người kh
    public function adminUpdatePass(Request $request, $id)
    {
        // $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        if ($request->renewpassword == $request->newpassword) {
            $item = User::find($id);
            $item->password = bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        } else {
            $notification = [
                'sainhap' => 'Bạn nhập mật khẩu không trùng khớp!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $user = User::find($id);
        if ($user->group->name != 'Supper Admin') {
            $user->delete();
        } else {
            return dd(__METHOD__);
        }
    }
}
