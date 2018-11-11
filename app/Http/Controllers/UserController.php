<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $users)
    {
        $this->middleware('auth');
        $this->user = $users;
    }

    public function index()
    {
        $users = $this->user;
        $users = $users::all();

        $data = [
            'title' => 'Usuarios del sistema',
            'users' => $users
        ];
        return view('users.index', $data);
    }
}
