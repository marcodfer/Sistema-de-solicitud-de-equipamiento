<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class layoutAdm extends Controller
{
	public function layoutAdm(Request $Request){
    	return view('layoutAdm');
    }

    public function ticketS(Request $Request){
    	return view('ticket-soporte');
    }

    public function Inventario(Request $Request){
    	return view('Inventario');
    }

    public function equipoAdm(Request $Request){
    	return view('equipoAdm');
    }
}
