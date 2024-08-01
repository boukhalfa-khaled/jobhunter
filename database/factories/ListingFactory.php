<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->jobTitle();
        $datetime = fake()->dateTimeBetween('-1 month', 'now');
        $content = '';
        for($i=0 ; $i < 5; $i++) {
            $content .= '<p class="mb-4">' . fake()->sentences(rand(5,10), true) . '</p>';
        }
        return [
            //'employer_id' => Employer::factory(),
            'title' => $title,
            'slug' => Str::slug($title). '-' . rand(11111,9999),
            'salary' => fake()->randomElement(['150,000 DA', '100,000 DA', '70,000 DA']),
            'location' => fake()->country(),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'apply_link' => fake()->url(),
            'content' => $content,
            'created_at' => $datetime,
            'updated_at' => $datetime,
            
        ];
    }
}
