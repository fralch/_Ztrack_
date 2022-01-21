<?php

namespace App\Http\Controllers\Paneles;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    //
    public function verPanel()
    {
        return Inertia::render('Paneles/panel', []);
    }
    
}
