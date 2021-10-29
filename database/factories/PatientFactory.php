<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'location' => $this->faker->city,
            'blood_group' => $this->faker->randomElement(['A', 'AB', 'O']),
            'genotype' => $this->faker->randomElement((['AA', 'AS', 'AC', 'SC', 'SS'])),
        ];
    }
}
