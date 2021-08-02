<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postforgot(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|:users',
        ]);
    }
}
