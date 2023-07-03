<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request, User $user)
    {
        Follower::create([
            'user_id' => $user->id,
            'follower_id' => auth()->user()->id
        ]);

        return back();
    }

    public function destroy(User $user, Request $request)
    {
        $user->followers()->where('follower_id', auth()->user()->id)->delete();

        return back();
    }
}
