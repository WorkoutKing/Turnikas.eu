<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::where('approved', true)->orderBy('user_id')->orderBy('exercise_type')->orderBy('repetitions')->paginate(30);

        return view('exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exercise_type' => 'required|in:pull-ups,dips,push-ups',
            'repetitions' => 'required|integer|min:1',
        ]);

        $exercise = new Exercise;
        $exercise->exercise_type = $validatedData['exercise_type'];
        $exercise->repetitions = $validatedData['repetitions'];
        $exercise->user_id = Auth::id();
        $exercise->save();

        return redirect()->back()->with('success', 'Exercise uploaded successfully. It will be reviewed before appearing on the site.');
    }

    public function approve(Request $request, Exercise $exercise)
    {
            $exercise->approved = true;
            $exercise->save();

            return redirect()->back()->with('success', 'Exercise approved successfully.');
    }
    public function pending()
    {
        $exercises = Exercise::select('exercises.*')
        ->join(
            DB::raw('(SELECT user_id, exercise_type, MIN(created_at) as created_at FROM exercises WHERE approved = false GROUP BY user_id, exercise_type) as t'),
            function($join) {
                $join->on('exercises.user_id', '=', 't.user_id');
                $join->on('exercises.exercise_type', '=', 't.exercise_type');
                $join->on('exercises.created_at', '=', 't.created_at');
            }
        )
        ->orderBy('repetitions')
        ->paginate(30);

    return view('exercises.pending', compact('exercises'));

    }
    public function delete(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->back()->with('success', 'Exercise deleted successfully.');

    }

}
