<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'content' => "<p>This is the <strong>content</strong> of project. You can add HTML here.</p>",
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'handover_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['ongoing', 'completed']),
        ];
    }
}
