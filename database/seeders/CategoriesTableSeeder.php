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
            ['name' => 'Rows/Australian Pull Ups (R)', 'points' => 2],
            ['name' => 'Tuck Front Lever (S)', 'points' => 4],
            ['name' => 'Advance Front Lever (S)', 'points' => 5],
            ['name' => 'Straddle Front Lever (S)', 'points' => 6],
            ['name' => 'Full Front Level (S)', 'points' => 8],
            ['name' => 'Straddle Front Lever Pull Ups (R)', 'points' => 9],
            ['name' => 'Full Front Lever Pull Ups (R)', 'points' => 10],
            ['name' => 'Lean Planche (S)', 'points' =>1 ],
            ['name' => 'Frog Stand (S)', 'points' =>3 ],
            ['name' => 'Tuck Planche (S)', 'points' =>5 ],
            ['name' => 'Advance Planche (S)', 'points' =>6 ],
            ['name' => 'Straddle Planche (S)', 'points' =>8 ],
            ['name' => 'One Leg Planche (S)', 'points' =>9 ],
            ['name' => 'Full Planche (S)', 'points' =>11 ],
            ['name' => 'German Hang (S)', 'points' => 1],
            ['name' => 'Tuck Back Lever (S)', 'points' => 3],
            ['name' => 'Advance Back Lever (S)', 'points' => 4],
            ['name' => 'Straddle Back Lever (S)', 'points' => 5],
            ['name' => 'Half One Leg Back Lever (S)', 'points' => 6],
            ['name' => 'Full Back Lever (S)', 'points' => 7],
            ['name' => 'Full Back Lever Pull Ups (R)', 'points' => 8]
        ]);
    }
}
