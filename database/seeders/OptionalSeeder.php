<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Optional;

class OptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optionals = ['car_space', 'wifi', 'pool', 'kitchen', 'garden', 'sea_view', 'icon'];

        foreach ($optionals as $optional) {
            $newOptional = new Optional();
            $newOptional->name = $optional;
            $newOptional->slug = Optional::generateSlug($newOptional->name);

            $newOptional->save();
        }
    }
}
