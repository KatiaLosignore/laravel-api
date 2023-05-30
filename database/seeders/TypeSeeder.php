<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = ['Frontend', 'Backend', 'FullStack', 'Design', 'Cyber Security'];

        foreach ($names as $name) {
            $type = new Type();
            $type->name = $name;
            $type->slug = Str::slug($name, '-');
            $type->color = $faker->hexColor();
            $type->save();
        }
    }
}
