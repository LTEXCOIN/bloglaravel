<?php

namespace Tests\Feature;

use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     * @tst
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function login()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
