<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Registration form
     */
    public function create()
    {
        return view('auth.registration');
    }
    /**
     * Registration formSubmit
     */
    public function store(RegistrationRequest $request)
    {
        $user                   = new User();
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->save();

        session()->flash('message', 'Thanks for Registration');
        return redirect()->route('login');
    }


}
