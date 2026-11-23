<?php

namespace Database\Factories;

use App\Models\CraftLog;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CraftLog>
 */
class CraftLogFactory extends Factory
{
    protected $model = CraftLog::class;

    public function definition(): array
    {
        return [
            'player_id' => User::factory(),
            'recipe_id' => Recipe::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }

    public function recent(): static {
        return $this->state(fn (array $attributes) => ['created_at' => now()]);
    }
}
