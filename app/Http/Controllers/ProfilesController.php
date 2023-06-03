<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
    public function showing($id, Skill $skill, Exercise $exercise, User $user)
    {
        $user = User::find($id);
        $users = auth()->user();
        $uploads = Skill::with('user', 'category')
            ->select('skills.*')
            ->join(DB::raw('(SELECT category_id, MAX(number) as max_skill_number FROM skills GROUP BY category_id) as s2'), function ($join) {
                $join->on('skills.category_id', '=', 's2.category_id');
                $join->on('skills.number', '=', 's2.max_skill_number');
            })
            ->where('skills.user_id', $users->id)
            ->where('skills.approved', true)
            ->orderBy('s2.max_skill_number', 'desc')
            ->get();

        $totalPoints = $uploads->sum('category.points');
        $uniqueCategoriesCount = $uploads->unique('category_id')->count();

        $exercises = collect();
        if ($user) {
            $exercises = Exercise::where('user_id', $user->id)
                ->where('approved', true)
                ->get()
                ->groupBy('exercise_type')
                ->map(function ($exercises) {
                    return $exercises->sortByDesc('repetitions')->first();
                });
        }

        return view('profiles.show', compact('user', 'users', 'uploads', 'totalPoints', 'uniqueCategoriesCount', 'exercises'));
    }
}