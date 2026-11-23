<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Override;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'result_item_id' => Item::factory()->craftable(),
            'result_quantity' => $this->faker->numberBetween(1, 3),
        ];
    }

    #[Override]
    public function configure(): static
    {
        return $this->afterCreating(function (Recipe $recipe) {
            $resources = Item::where('type', 'resource')->isRandomOrder()->limit(rand(2, 4))->get();

            if ($resources->isEmpty()) {
                $resources = Item::factory()->resource()->count(3)->create();
            }

            foreach ($resources as $resource) {
                $recipe->ingredients()->attach($resource->id, [
                    'quantity' => $this->faker->numberBetween(1, 10),
                ]);
            }
        });
    }

    public function cheap(): static {
        return $this->state(fn (array $attributes) => ['result_quantity' => 1]);
    }
}
