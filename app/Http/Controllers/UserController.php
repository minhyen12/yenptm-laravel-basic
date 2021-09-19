<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('mail_address', 'asc')->paginate(20);
        $stt = 0;
        if ($users->currentPage() > 1) {
            $stt = $users->perPage() * ($users->currentPage() - 1);
        }
        return view('user/list', ['listUser' => $users, 'stt' => $stt]);
    }
    public function store(RegisterRequest $request)
    {
        $data = [
            'mail_address' => $request->mail_address,
            'name' => $request->name,
            'password' => md5($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ];
        $user = User::create($data);
        if($user) {
            Session::flash('success', 'Thêm mới thành công!!!');
            return redirect()->route('users.index');
        } else {
            Session::flash('error', 'Thêm không thành công!!!');
            return redirect()->route('users.create');
        }
    }
    public function create()
    {
        return view('user/register');
    }
}
