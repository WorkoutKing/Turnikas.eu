<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Wall Handstand (S)', 'points' => 14],
            ['name' => 'Handstand (S)', 'points' => 15],
            ['name' => 'Wall Handstand PU (R)', 'points' => 19],
            ['name' => 'Handstand Push Up (R)', 'points' => 21],
            ['name' => 'One Arm Handstand (S)', 'points' => 30],
            ['name' => 'German Hang (S)', 'points' => 1],
            ['name' => 'Tuck Back Lever (S)', 'points' => 5],
            ['name' => 'Advance Back Lever (S)', 'points' => 6],
            ['name' => 'Straddle Back Lever (S)', 'points' => 22],
            ['name' => 'Full Back Lever (S)', 'points' => 23],
            ['name' => 'Full Back Lever Pull Ups (R)', 'points' => 29],
            ['name' => 'Rows/Australian Pull Ups (R)', 'points' => 3],
            ['name' => 'Tuck L-sit (S)', 'points' => 3],
            ['name' => 'L-sit (S)', 'points' => 5],
            ['name' => 'Tuck Front Lever (S)', 'points' => 9],
            ['name' => 'Advance Front Lever (S)', 'points' => 19],
            ['name' => 'Straddle Front Lever (S)', 'points' => 26],
            ['name' => 'Full Front Level (S)', 'points' => 28],
            ['name' => 'Straddle Front Lever Pull Ups (R)', 'points' => 30],
            ['name' => 'Full Front Lever Pull Ups (R)', 'points' => 31],
            ['name' => 'Hang Pull FL to inverted (R)', 'points' => 35],
            ['name' => 'Circle Front Lever (R)', 'points' => 36],
            ['name' => 'Lean Planche (S)', 'points' => 3],
            ['name' => 'Frog Stand (S)', 'points' => 4],
            ['name' => 'Tuck Planche (S)', 'points' => 19],
            ['name' => 'Advance Planche (S)', 'points' => 24],
            ['name' => 'Straddle Planche (S)', 'points' => 25],
            ['name' => 'Full Planche (S)', 'points' => 31],
            ['name' => 'Muscle Up (R)', 'points' => 26],
            ['name' => 'Wide Muscle Up (R)', 'points' => 27],
            ['name' => 'L-Sit Muscle Up (R)', 'points' => 29],
            ['name' => 'Full Squat (R)', 'points' => 3],
            ['name' => 'Assisted Pistol Squat (R)', 'points' => 14],
            ['name' => 'Shrimp Squat (R)', 'points' => 19],
            ['name' => 'Pistol Squat (R)', 'points' => 23],
            ['name' => 'NC Negative (R)', 'points' => 23],
            ['name' => 'Nordic Curl (R)', 'points' => 24],
            ['name' => 'Adv Tuck Dragon Flag (R)', 'points' => 16],
            ['name' => 'Straddle Dragon Flag (R)', 'points' => 19],
            ['name' => 'Dragon Flag (R)', 'points' => 20],
            ['name' => 'Ab Wheel (R)', 'points' => 24],
            ['name' => 'Ankle Weight dragon Flag (R)', 'points' => 30],
            ['name' => 'One Arm Dragon Flag (R)', 'points' => 31],
            ['name' => 'One Arm Ab Wheel (R)', 'points' => 34],
        ]);
    }
}
//['name' => '','points'=>],
// 878 points
