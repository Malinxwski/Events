<?php

namespace Tests\Feature;

use App\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitePersonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;

    public function testExample()
    {

        $response = $this->json('POST', '/api/people',
            [
                'name' => $this->faker->firstName,
                'surname'=>$this->faker->lastName,
                'email' => $this->faker->unique()->safeEmail,
                'event_id'=>$this->faker->numberBetween(1,3)
                ]);

        $response->assertStatus(201);

    }
}
