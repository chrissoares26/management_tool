<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class SiteContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
            return [
                'name' => $this->faker->name,
                'phone' => $this->faker->tollFreePhoneNumber,
                'email' => $this->faker->unique()->email,
                'contact_reason' => $this->faker->numberBetween(1,3),
                'message' => $this->faker->text(200)
        ];
        
    }
}
