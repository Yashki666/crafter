<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Выдаём игрокам ресурсы...');

        $resources = Item::where('type', 'resource')->get();

        User::all()->each(function (User $user) use ($resources) {
            foreach ($resources->random(rand(5, 10)) as $resource) {
                Inventory::updateOrCreate(
                    ['player_id' => $user->id, 'item_id' => $resource->id],
                    ['quantity' => rand(10, 100)]
                );
            }
        });
    }
}
