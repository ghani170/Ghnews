<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function index(){
        $votes = Vote::whereHas('user')->with('user')->get();
        return view('admin.votes.index', compact('votes'));
    }

    public function create(){
        return view('admin.votes.create');
    }
}
