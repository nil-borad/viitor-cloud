<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::get()->pluck('id')->toArray();
        return [
            'user_id'   =>  Arr::random($users),
            'title'     =>  $this->faker->title(),
            'content'   =>  $this->faker->text(5000),
        ];
    }
}
