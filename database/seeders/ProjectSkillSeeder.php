<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectSkill = [
            [
                'project_id' => 1,
                'skill_id' => [1, 2, 6, 8]
            ],
            [
                'project_id' => 2,
                'skill_id' => [1, 3, 4, 7, 8]
            ],
            [
                'project_id' => 3,
                'skill_id' => [1, 2, 6, 9]
            ],
        ];

        foreach ($projectSkill as $item) {
            $projectId = $item['project_id'];
            $skillIds = $item['skill_id'];
        
            $project = Project::find($projectId);
            $project->skills()->attach($skillIds);
        }
    }
}
