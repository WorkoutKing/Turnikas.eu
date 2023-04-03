<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = [
        'name',
        'points'
    ];
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function topSkillUploaders()
    {
      return User::join('skills', 'users.id', '=', 'skills.user_id')
         ->where('skills.category_id', $this->id)
         ->select('users.*', DB::raw('COUNT(skills.id) as repetitions'), 'skills.number')
         ->groupBy('users.id', 'skills.number')
         ->orderByRaw('COUNT(skills.id) DESC, skills.number DESC')
         ->limit(10)
         ->get();

    }

}
