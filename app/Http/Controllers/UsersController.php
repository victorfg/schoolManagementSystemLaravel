<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\User;
use App\user;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.create');
    }

    /**
     * @param \App\Http\Requests\UsersStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        $user = User::create($request->validated());

        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return view('user.show');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($id);

        return view('user.destroy', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = User::find($id);

        return view('user.destroy', compact('user'));
    }
}
