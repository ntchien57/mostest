<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function login()
    {
        return view('user.login');
    }

    public function contact(Request $request)
    {
        LienHe::create([
            'tenkhach' => $request->hoten,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'ykien' => $request->ykien,
            'ngaylienhe' => NOW(),
        ]);

        return redirect()->back()->with('success','Gửi liên hệ thành công');
    }
}
