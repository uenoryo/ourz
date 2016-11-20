<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\Member;
use App\Http\Requests\TeamStoreRequest;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($name){
        return view('team/index')->with(['team' => Team::where(['name' => $name])->first()]);
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
