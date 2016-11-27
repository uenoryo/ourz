<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($name)
    {
        return view('team/index')->with(['team' => Team::where(['name' => $name])->first()]);
    }
}
