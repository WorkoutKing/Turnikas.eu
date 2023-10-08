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
    public function myExercise()
    {
        $user = Auth::user();

        $exercises = Exercise::where('user_id', $user->id)
            ->where('approved', true)
            ->orderBy('exercise_type')
            ->orderBy('repetitions')
            ->paginate(30);

        return view('exercises.myexercises', compact('exercises'));
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
            'video' => 'file|max:300000',
            'youtube_url' => 'nullable|url',

        ]);

        $exercise = new Exercise;
        $exercise->exercise_type = $validatedData['exercise_type'];
        $exercise->repetitions = $validatedData['repetitions'];
        $exercise->user_id = Auth::id();

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('public/videos');
            $exercise->video = str_replace('public/', '', $videoPath);
        }
        $exercise->youtube_url = $validatedData['youtube_url'];

        if ($exercise->save()) {
            return redirect()->back()->with('success', 'Exercise added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add exercise.');
        }
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
                function ($join) {
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