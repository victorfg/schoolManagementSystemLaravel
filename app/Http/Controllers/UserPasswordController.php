<?php

namespace App\Http\Controllers;

use App\User;
use App\userPassword;
use Illuminate\Http\Request;

class UserPasswordController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\userPassword $userPassword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPassword $userPassword)
    {
        $user = User::find($id);

        return view('user.destroy', compact('user'));
    }
}
