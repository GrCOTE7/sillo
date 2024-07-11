<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	/**
	 * The current password being used by the factory.
	 */
	protected static ?string $password;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$gender = fake()->randomElement(['female', 'male', 'other']);

		return [
			'firstname'      => ('male' == $gender) ? fake()->firstNameMale() : fake()->firstNameFemale(),
			'name'           => fake()->lastname(),
			'email'          => fake()->unique()->safeEmail(),
			'gender'         => $gender,
			'password'       => static::$password ??= Hash::make('password'),
			'remember_token' => Str::random(10),
			'valid'          => true,
		];
	}

	/**
	 * Indicate that the model's email address should be unverified.
	 */
	public function unverified(): static
	{
		return $this->state(fn (array $attributes) => [
			'email_verified_at' => null,
		]);
	}
}
