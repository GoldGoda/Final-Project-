<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Código para mostrar la página de inicio
    }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();
        
        Auth::login($user);
        redirect('/');
    }
}
