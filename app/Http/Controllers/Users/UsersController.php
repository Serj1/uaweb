<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $results = User::all();

        return view('admin.users.list', ['users' => $results]);
    }


    public function create()
    {
        return view('admin.users.form');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            exit('user not found');
        }

        return view('admin.users.form', ['user' => $user]);
    }


    /**
     * Store a new user.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return redirect('admin/users');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->login = $request->input('login');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/users');
    }


}