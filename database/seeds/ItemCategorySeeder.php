<?php

use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Alat Tulis'],
            ['name' => 'Alat Dapur'],
            ['name' => 'Pembersih'],
        ];

        foreach ($categories as $category) {
            \App\Entities\ItemCategory::query()->create($category);

            $this->command->info('Category ' . $category['name'] . 'has been seeded!');
        }
    }
}
