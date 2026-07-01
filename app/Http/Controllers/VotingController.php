<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function index()
    {
        return view('user.voting.index');
    }

    public function vote(Request $request)
    {
        $deviceId = $request->cookie('device_id');

        if (!$deviceId) {
            $deviceId = uniqid('', true);
        }

        if (Vote::where('device_id', $deviceId)->exists()) {
            return back()->with('errors', 'anda sudah pernah voting');
        }

        Vote::create([
            'option' => $request->option,
            'device_id' => $deviceId,
            'user_id' => Auth::id(),
            'suggestion' => $request->suggestion,
        ]);

        $oneHundredYears = 60 * 24 * 365 * 500;

        return back()
            ->withCookie(cookie('device_id', $deviceId, $oneHundredYears))
            ->with('success', 'Terima kasih sudah voting');
    }
}
