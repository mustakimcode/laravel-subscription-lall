<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPackage>
 */
class UserPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $int= mt_rand(1262055681,1262055681);
        return [
            'user_id' => rand(1,10),
            'package_id' => rand(1,10),
            'expired_date' => date('Y-m-d', strtotime( '+'.mt_rand(0,10).' days'))
        ];
    }
}
