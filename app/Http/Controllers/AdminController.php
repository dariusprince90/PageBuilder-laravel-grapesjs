<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::all();
        return view('admin', compact('data'));
    }

    public function destroy($id)
    {
        $user = USer::find($id);
        $user->delete();
        return back();
    }

    public function premium($id)
    {
        $user = User::find($id);
        $user->role_id = 1;
        $user->save();
        return back();
    }
}
