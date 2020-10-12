<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordUpdateRequest;
use App\User;
use App\userPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\userPassword $userPassword
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('userPassword.edit', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\userPassword $userPassword
     * @return \Illuminate\Http\Response
     */
    public function update(UserPasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('home');
    }
}
