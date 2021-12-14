<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('admin.pengguna.detail', compact('user'));
        }
    }
}
