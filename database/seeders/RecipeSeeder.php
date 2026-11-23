<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("Создаём рецепты...");

        $resources = Item::where('type', 'resource')->get();
        $results = Item::whereIn('type', ['tool', 'weapon', 'armor'])->get();

        $results->each(function (Item $result) use ($resources) {
            $recipe = Recipe::firstOrCreate(
                ['name' => 'Изготовление: ' . $result->name],
                ['result_item_id' => $result->id, 'result_quantity' => rand(1, 3)]
            );

            foreach ($resources->random(rand(2, 4)) as $resource) {
                $recipe->ingredients()->attach($resource->id, ['quantity' => rand(1, 10)]);
            }
        });
    }
}
