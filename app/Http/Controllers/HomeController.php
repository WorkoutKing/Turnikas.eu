<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class HomeController extends Controller
{
    public function index()
    {
        $exerciseTypes = ['pull-ups', 'dips', 'push-ups'];
        $usersByExerciseType = [];

        foreach ($exerciseTypes as $type) {
            $usersByExerciseType[$type] = User::with(['exercises' => function ($query) use ($type) {
                $query->where('approved', true)->where('exercise_type', $type)->orderByDesc('repetitions');
            }])->get()->sortByDesc(function ($user) use ($type) {
                return $user->exercises->where('approved', true)->where('exercise_type', $type)->max('repetitions');
            })->take(3);
        }
        $users = User::all();

        return view('home', compact('users','usersByExerciseType'));
    }
}