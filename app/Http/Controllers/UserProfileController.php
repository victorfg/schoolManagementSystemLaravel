<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('profile.index',compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $userValues = [
            'name'=>$request->input('name') ?? $user->name,
            'surname'=> $request->input('surname') ?? $user->surname,
            'email'=> $request->input('email') ?? $user->email,
        ];
        $user->update($userValues);
        $modified = true;
        return view('profile.index',compact('user','modified'));
    }
}
