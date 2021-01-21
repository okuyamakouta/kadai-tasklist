<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc');
            $data = [
                'user' => $user,
                'tasks' => $tasks,
                ];
        }
        return view('index', $data);
    }
}
