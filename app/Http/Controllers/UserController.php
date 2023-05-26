<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\OnlineUser;
use App\Models\Skill;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        $uploads = Skill::with('user', 'category')
            ->select('skills.*')
            ->join(DB::raw('(SELECT category_id, MAX(number) as max_skill_number FROM skills GROUP BY category_id) as s2'), function ($join) {
                $join->on('skills.category_id', '=', 's2.category_id');
                $join->on('skills.number', '=', 's2.max_skill_number');
            })
            ->where('skills.user_id', $user->id)
            ->where('skills.approved', true)
            ->orderBy('s2.max_skill_number', 'desc')
            ->get();

        $totalPoints = $uploads->sum('category.points');
        $uniqueCategoriesCount = $uploads->unique('category_id')->count();

        $exercises = Exercise::where('user_id', $user->id)->where('approved', true)->get()->groupBy('exercise_type')->map(function ($exercises) {
            return $exercises->sortByDesc('repetitions')->first();
        });

        return view('profile', compact('user', 'uploads', 'totalPoints', 'uniqueCategoriesCount', 'exercises'));
    }
    public function index()
    {

        $users = User::all();
        $onlineUsers = OnlineUser::all();

        return view('users.index', compact('users', 'onlineUsers'));
    }
    public function privacy()
    {
        return view('users.privacy');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error deleting user');
        }
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|integer|in:1,2,3'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
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

        $exercises = Exercise::where('user_id', $user->id)->where('approved', true)->get()->groupBy('exercise_type')->map(function ($exercises) {
            return $exercises->sortByDesc('repetitions')->first();
        });
        return view('users.show', compact('user', 'users', 'uploads', 'totalPoints', 'uniqueCategoriesCount', 'exercises'));
    }


}