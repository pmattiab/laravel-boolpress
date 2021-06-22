<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        
        $data = [
            "user" => $user
        ];

        // per conoscere l'id dell'utente loggato
        // $id = Auth::id();
        //
        // per controllare se l'utente è loggato o meno (ritorna true/false)
        // $user_logged = Auth::check();

        return view('admin.home', $data);
    }
}
