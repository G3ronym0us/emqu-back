<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionnaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email'             => $this->faker->email(),
            'age'               => $this->faker->randomElement($array = array ('18-25','26-33','34-40','40+')),
            'gender'            => $this->faker->randomElement(array('Female', 'Male')),
            'social_network'    => $this->faker->randomElement($array = array ('Facebook','Twitter','Instagram','Whatsapp','TikTok')),
            'facebook_time'     => $this->faker->numberBetween(1,24),
            'whatsapp_time'     => $this->faker->numberBetween(1,24),
            'twitter_time'      => $this->faker->numberBetween(1,24),
            'instagram_time'    => $this->faker->numberBetween(1,24),
            'tiktok_time'       => $this->faker->numberBetween(1,24),
        ];
    }
}
