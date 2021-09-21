<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::getByUser();
        $stt = 0;
        if ($listUser->currentPage() > 1) {
            $stt = $listUser->perPage() * ($listUser->currentPage() - 1);
        }
        return view('user/list', ['listUser' => $listUser, 'stt' => $stt]);
    }
    public function store(RegisterRequest $request)
    {

        $user = User::createUser($request->all());
        if($user) {
            Session::flash('success', trans('messages.success'));
            return redirect()->route('users.index');
        } else {
            Session::flash('error', trans('messages.error'));
            return redirect()->route('users.create');
        }
    }
    public function create()
    {
        return view('user/register');
    }
}
