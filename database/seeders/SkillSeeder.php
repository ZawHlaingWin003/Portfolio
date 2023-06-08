<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'PHP/Laravel', 
            'Bootstrap & Sass', 
            'TailwindCss', 
            'VueJs VueRouter Vuex', 
            'Pania', 
            'Js/Jquery', 
            'Stripe Payment Integration',
            'Atomic Design System',
            'Responsive Design'
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill
            ]);
        }
    }
}
