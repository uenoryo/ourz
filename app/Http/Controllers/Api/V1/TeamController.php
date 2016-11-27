<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\TeamUser;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function members($team_id)
    {
        $members = TeamUser::where('team_id', $team_id);
        if ($members->exists()) {
            return \Response::json([
                'status' => 'FOUND',
                'data'   => $members->with('user')->with('member')->get(),
            ]);
        } else {
            return \Response::json(
                [
                    'status' => 'NOT-FOUND',
                ],
                404
            );
        }
    }
}
