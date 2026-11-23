<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("Создаём предметы...");

        $items = [
            ['name' => 'Железо',    'slug' => 'iron',       'type' => 'resource'],
            ['name' => 'Дерево',    'slug' => 'wood',       'type' => 'resource'],
            ['name' => 'Камень',    'slug' => 'stone',      'type' => 'resource'],
            ['name' => 'Кожа',      'slug' => 'leather',    'type' => 'resource'],
            ['name' => 'Ткань',     'slug' => 'cloth',      'type' => 'resource'],
            ['name' => 'Уголь',     'slug' => 'coal',       'type' => 'resource'],
            ['name' => 'Медь',      'slug' => 'copper',     'type' => 'resource'],
            ['name' => 'Золото',    'slug' => 'gold',       'type' => 'resource'],
            ['name' => 'Кость',     'slug' => 'bone',       'type' => 'resource'],
            ['name' => 'Смола',     'slug' => 'resin',      'type' => 'resource'],
            ['name' => 'Кирка',     'slug' => 'pickaxe',    'type' => 'tool'],
            ['name' => 'Топор',     'slug' => 'axe',        'type' => 'tool'],
            ['name' => 'Молот',     'slug' => 'hammer',     'type' => 'tool'],
            ['name' => 'Пила',      'slug' => 'saw',        'type' => 'tool'],
            ['name' => 'Лопата',    'slug' => 'shovel',     'type' => 'tool'],
            ['name' => 'Меч',       'slug' => 'sword',      'type' => 'weapon'],
            ['name' => 'Лук',       'slug' => 'bow',        'type' => 'weapon'],
            ['name' => 'Кинжал',    'slug' => 'dagger',     'type' => 'weapon'],
            ['name' => 'Шлем',      'slug' => 'helmet',     'type' => 'armor'],
            ['name' => 'Нагрудник', 'slug' => 'chestplate', 'type' => 'armor'],
        ];

        foreach ($items as $item) {
            Item::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
