<?php

namespace App\Http\Controllers;

use App\Models\Trayecto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trayectos = Trayecto::all();
        return view('welcome', array('trayectos'=> $trayectos));
    }
}
