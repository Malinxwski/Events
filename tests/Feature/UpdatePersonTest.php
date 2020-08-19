<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatePersonTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('PUT', '/api/people/1',
            [
                'email'=> $this->faker->unique()->safeEmail,
                'name' => $this->faker->firstName,
                'surname'=>$this->faker->lastName,
                'event_id'=>$this->faker->numberBetween(1,3)
            ]);

        $response->assertStatus(200);
    }
}
