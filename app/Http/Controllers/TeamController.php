<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

use App\Models\Team;

class TeamController extends Controller
{
    private $team;
    private $user;

    public function __construct(Router $router)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) use ($router) {
            $name = $router->getCurrentRoute()->getParameter('name', '');
            $this->team = Team::where(['name' => $name])->first();
            $this->user = \Auth::user()->member($this->team->id);
            if ($this->user->isWaiting()) {
                \Session::flash('error', '承認待ちです');
                return redirect()->route('user.index');
            }
            if (!$this->user->isAuthenticated()) {
                \Session::flash('error', '承認されていません');
                return redirect()->route('user.index');
            }
            return $next($request);
        });
    }

    public function index($name)
    {
        return view('team/index')->with([
            'team' => $this->team,
            'user' => $this->user,
        ]);
    }
}
