<?php

namespace App\Http\Controllers\Paneles;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    //
    public function verLogin()
    {
        return Inertia::render('login', []);
    }
    public function board()
    {
        return Inertia::render('Panel/board', []);
    }
    
}
