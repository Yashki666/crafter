<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    public const catalog = [
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

    public function definition(): array
    {
        return $this->faker->unique()->randomElement(self::catalog);
    }

    public function resource(): static
    {
        return $this->state(fn(array $attributes) => $this->fromType('resource'));
    }

    public function tool(): static
    {
        return $this->state(fn(array $attributes) => $this->fromType('tool'));
    }

    public function weapon(): static
    {
        return $this->state(fn(array $attributes) => $this->fromType('weapon'));
    }

    public function armor(): static
    {
        return $this->state(fn(array $attributes) => $this->fromType('armor'));
    }

    public function craftable(): static
    {
        return $this->state(function (array $attributer) {
            $pool = array_values(array_filter(
                self::catalog,
                fn($i) => in_array($i['type'], ['tool', 'weapon', 'armor'])
            ));

            return $this->faker->unique()->randomElement($pool);
        });
    }

    protected function fromType(string $type): array {
        $pool = array_values(array_filter(self::catalog, fn ($i) => $i['type'] == $type));

        return $this->faker->unique()->randomElement($pool);
    }
}
