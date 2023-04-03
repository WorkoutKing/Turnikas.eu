<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function index()
    {
        $pendingSkills = Skill::where('approved', 1)->with('category')->orderBy('user_id')->paginate(30);
        return view('skills.index', compact('pendingSkills'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'youtube_link' => 'required|url',
            'number' => 'required|integer',
        ]);
        $skill = new Skill();
        $skill->category_id = $validatedData['category_id'];
        $skill->youtube_link = $validatedData['youtube_link'];
        $skill->number = $validatedData['number'];
        $skill->user_id = auth()->id(); // set the authenticated user ID
        $skill->save();
        return redirect()->back()->with('message', 'Skill added successfully.');
    }
    public function pending()
    {
        $pendingSkills = Skill::select('skills.*')
        ->with('category')
        ->where('approved', 0)
        ->join(DB::raw('(SELECT category_id, user_id, MAX(number) as max_number
                        FROM skills
                        WHERE approved = 0
                        GROUP BY category_id, user_id) as max_skills'),
               function($join) {
                   $join->on('skills.category_id', '=', 'max_skills.category_id')
                        ->on('skills.user_id', '=', 'max_skills.user_id')
                        ->on('skills.number', '=', 'max_skills.max_number');
               })
        ->orderByDesc('number')
        ->get();
    return view('skills.pending', compact('pendingSkills'));
    }

    public function approve(Skill $skill)
    {
        $skill->approved = true;
        $skill->save();

        return redirect()->back()->with('success', 'Skill approved successfully.');
    }
    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }
    public function create()
    {
        $categories = Category::all();
        $skill = new Skill();
        $skill->user_id = auth()->id(); // set the user_id attribute
        return view('skills.create', compact('categories', 'skill'));
    }
    public function notapprove(Skill $skill)
    {
        $skill->delete();

        return redirect()->back()->with('success', 'Skill not approved.');
    }
}
