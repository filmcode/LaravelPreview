<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class GraficaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = DB::table('users')->get();
        $labels = [];
        $datos = [];
        foreach ($users as $user) {
            $label = DB::table('productos')->where('user_id', $user->id)->count();
            $labels[] = $user->name;
            $datos[] = $label;
        }
        return view('grafica.index', compact('labels', 'datos'));
    }
}
