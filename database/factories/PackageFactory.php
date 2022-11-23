<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name =fake()->name();
        return [
            'name' => $name,
            'duration' => rand(10, 100),
            'code' => Str::of($name)->slug('-'),
            'price' => rand(1000,9999)
        ];
    }
}
