<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Member;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use App\Http\Requests\TeamStoreRequest;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user/index')->with(['teams' => \Auth::user()->teams()->get()]);
    }

    public function create()
    {
        return view('team/create');
    }

    public function store(TeamStoreRequest $request)
    {
        $input = $request->only(['name', 'display']);

        \DB::transaction(function () use ($input){
            $team = Team::create([
                'name'    => $input['name'],
                'display' => $input['display'],
            ]);
            $team_user = TeamUser::create([
                'team_id' => $team->id,
                'user_id' => \Auth::user()->id,
            ]);
            Member::create([
                'teams_users_id' => $team_user->id,
                'priority'       => Member::PRIORITY_ROOT,
            ]);
        });
        \Session::flash('success', 'チームを作成しました');
        return redirect()->route('user.index');
    }
}
